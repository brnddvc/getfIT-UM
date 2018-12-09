<?php
	session_start();
	$ime = "";
	$prezime = "";
	$brojKartice = "";
	$nacinPlacanja = "";
	$username = "";
	$greske = array();

	$db = mysqli_connect('localhost', 'root', '', 'getfit');
	mysqli_set_charset($db, "utf8");

	//ako se pritisne dugme za registraciju
	if (isset($_POST['registracija'])) {
		$ime = mysqli_escape_string($db, $_POST['ime']);
		$prezime = mysqli_escape_string($db, $_POST['prezime']);
		$brojKartice = mysqli_escape_string($db, $_POST['brojKartice']);
		$nacinPlacanja = mysqli_escape_string($db, $_POST['nacinPlacanja']);
		$username = mysqli_escape_string($db, $_POST['username']);
		$password1 = mysqli_escape_string($db, $_POST['password1']);
		$password2 = mysqli_escape_string($db, $_POST['password2']);

		//provjera da su sva polja ispunjena
		if(empty($ime)){
			array_push($greske, " Polje IME se mora popuniti");
		}
		if(empty($prezime)){
			array_push($greske, " Polje PREZIME se mora popuniti");
		}
		if(empty($brojKartice)){
			array_push($greske, " Polje BROJ KARTICE se mora popuniti");
		}
		if(empty($nacinPlacanja)){
			array_push($greske, " Polje NAČIN PLAĆANJA se mora popuniti");
		}
		if(empty($username)){
			array_push($greske, " Polje KORISNIČKO IME se mora popuniti");
		}
		if(empty($password1)){
			array_push($greske, " Polje ŠIFRA se mora popuniti");
		}
		if(empty($password2)){
			array_push($greske, " Polje ŠIFRA se mora popuniti");
		}

		//provjera sifri
		if ($password1 != $password2) {
			array_push($greske, "Unesene šifre nisu iste");
		}

		//ako je sve bez greske
		if (count($greske) == 0) {
			//popunjavanje
			$sql1="INSERT INTO korisnik(ime, prezime, brojKartice, nacinPlacanja) VALUES ('$ime','$prezime','$brojKartice','$nacinPlacanja')";
			mysqli_query($db, $sql1);
			$last_id1 = $db->insert_id;
			$sql = "INSERT INTO user (username, password) VALUES ('$username','$password1')";
			mysqli_query($db, $sql);
			$last_id = $db->insert_id;
			$sql2 = "INSERT INTO useruloga (userID, ulogaID) VALUES ('$last_id','1')";
			mysqli_query($db, $sql2);
			$last_id2 = $db->insert_id;
			$sql4 = "INSERT INTO korisnikuseruloga (korisnikID, userulogaID) VALUES ('$last_id1','$last_id2')";
			mysqli_query($db, $sql4);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Prijavljeni ste.";
			header('location: index.php');
		}

	}

	//prijava iz prijava stranice
	if(isset($_POST['prijava'])) {
		$username = mysqli_escape_string($db, $_POST['username']);
		$password = mysqli_escape_string($db, $_POST['password']);

		//provjera
		if(empty($username)){
			array_push($greske, " Polje KORISNIČKO IME se mora popuniti");
		}
		if(empty($password)){
			array_push($greske, " Polje ŠIFRA se mora popuniti");
		}
		if (count($greske)==0){
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) == 1) {
				$logovani_korisnik = mysqli_fetch_assoc($result);
				$user_ID = $logovani_korisnik['userID'];
				$query = "SELECT * FROM useruloga where userID=$user_ID";
				$result = mysqli_query($db, $query);
				if(mysqli_num_rows($result) == 1) {
					$logovani_korisnik = mysqli_fetch_assoc($result);
					if($logovani_korisnik['ulogaID'] > 1) {
						$_SESSION['username'] = $username;
						$_SESSION['success'] = "Prijavljeni ste.";
						header('location: treneri.php');
					}else{
						$_SESSION['username'] = $username;
						$_SESSION['success'] = "Prijavljeni ste.";
						header('location: index.php');
					}
				} 
			}else{
				array_push($greske, "Pogrešna kombinacija korisničkog imena i šifre");
				header('location: prijava.php');
			}
		}
	}

	//odjava
	if (isset($_GET['odjava'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: prijava.php');
	}
?>