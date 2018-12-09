<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>gymfIT</title>
</head>
<body background="slika.jpg">
	<div class="header">
		<h1><center>Prijava</center></h1>
	</div>

	<form method="post" action="prijava.php">
		<?php include('greske.php'); ?>
		<div class="input-group">
			<label>Korisničko ime</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Šifra</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="prijava" class="btn">Prijavi se</button>
		</div>
		<p>
			Novi si član?<a href="registracija.php">Registruj se</a>
		</p>
	</form>
</body>
</html>