<?php 
include_once('classes/Owners.class.php');






 ?><!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Restorapp</title>
 	<link rel="stylesheet" href="css/reset.css">
 	<link rel="stylesheet" href="css/screen.css">
 </head>
 <body>
 	
	<div id="login">
	<a href="index.php"><img src="images/logodik.png" alt="logoklein">	</a>
	
	<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

	<label for="username">Gebruikersnaam: </label>
	<input type="text" id="username" name="username">

	<p><label for="password">Paswoord: </label>
	<input type="password" id="password" name="password"></p>

	<input class="btn" type="submit" value="inloggen">
	</form>

	</div>
	<div class="clearfix">&nbsp;</div>

	<div id="container">

	<div id="logo">
		<img src="images/logo.png" alt="dit is het logo van Restorapp">
		<h1> Dé applicatie voor restauranthouders én -bezoekers.</p> 

	</div>
	<div class="clearfix">&nbsp;</div>
	
	<div id="signup">
	
	<h2>Nog geen lid ? Meld je nu aan! </h2>

	

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="name" placeholder="Naam" />
		<input type="text" name="firstname" placeholder="Voornaam" />
		<input type="text" name="street" placeholder="Straat" />
		<input type="text" name="number" placeholder="Huisnummer" />
		<input type="text" name="postcode" placeholder="Postcode" />
		<input type="text" name="city" placeholder="Plaats" />
		<input type="text" name="phonenumber" placeholder="Gsm-nummer" />
		<input type="email" name="email" placeholder="E-mail" />
		<input type="password" name="password" placeholder="Paswoord" />
		
		<input class="btn" type="submit" name="btnSignup" value="Aanmelden" />
		</form>
	</div> <!--end signup-->




	</div> <!-- end div container -->
 </body>
 </html>