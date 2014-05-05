<?php 










 ?><!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Restorapp</title>
 	<link rel="stylesheet" href="css/reset.css">
 	<link rel="stylesheet" href="css/screen.css">
 </head>
 <body>
 	
	<div id="logo">
		<img src="images/logo.png" alt="dit is het logo van Restorapp">
		<h1> Dé applicatie voor restauranthouders én -bezoekers.</p> 

	</div>


	<div id="login">
		
	<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

	<label for="username">Gebruikersnaam</label>
	<input type="text" id="username" name="username">

	<p><label for="password">Paswoord</label>
	<input type="password" id="password" name="password"></p>

	<input type="submit" value="inloggen">
	</form>

	</div>



 </body>
 </html>