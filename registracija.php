<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>gymfIT</title>
</head>
<body background="slika.jpg">
		<h1><center>Registracija</center></h1>

	<form method="post" action="registracija.php">
		<?php include('greske.php'); ?>
		<div class="input-group">
			<label>Ime</label>
			<input type="text" name="ime" value="<?php echo $ime; ?>">
		</div>
		<div class="input-group">
			<label>Prezime</label>
			<input type="text" name="prezime" value="<?php echo $prezime; ?>">
		</div>
		<div class="input-group">
			<label>Broj kartice</label>
			<input type="text" name="brojKartice" value="<?php echo $brojKartice; ?>">
		</div>
		<div class="input-group">
			<label>Način plaćanja</label>
			<input type="text" name="nacinPlacanja" value="<?php echo $nacinPlacanja; ?>">
		</div>
		<div class="input-group">
			<label>Korisničko ime</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Šifra</label>
			<input type="password" name="password1">
		</div>
		<div class="input-group">
			<label>Potvrdi šifru</label>
			<input type="password" name="password2">
		</div>
		<div class="input-group">
			<button type="submit" name="registracija" class="btn">Registruj se</button>
		</div>
		<p>
			Već si član? <a href="prijava.php">Prijavi se</a>
		</p>
	</form>
</body>
</html>