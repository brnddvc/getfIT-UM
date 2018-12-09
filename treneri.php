<?php include('server.php'); 
	
	//ako nisu prijavljeni
	if (empty($_SESSION['username'])) {
		header('location: prijava.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>gymfIT</title>
</head>
<body background="slika.jpg">
	<div class="header">
		<h1><center>Početna stranica</center></h1>
	</div>
	<br>
	<br>
	<br>
	<div class="content" style="text-align: center;">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3> 
					<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					 ?>
				</h3>
			</div>	
		<?php endif ?>
		<?php if (isset($_SESSION['username'])): ?>
			<p>Dobrodošao/la <strong><?php echo $_SESSION['username']; ?></strong></p>
			<h4>Vaši rasporedi se trenutno ažuriraju, pokušajte kasnije.</h4>
			<p><a href="index.php?odjava='1'" style="color: red;" name="odjava">Odjava</a></p>
		<?php endif ?>
	</div>
</body>
</html>