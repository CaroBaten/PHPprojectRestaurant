<?php

include_once('classes/Restaurant.class.php');

session_start();
if($_SESSION['loggedin']==false)
{
	header("Location: index.php");
	exit();
}
$restaurant = new Restaurant();


?>


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

	
	
	<?php echo "<p class='user'> Welkom ". $_SESSION['ownerName'] . " </p>" ?>

	</div> <!-- end div login-->
	<div class="clearfix">&nbsp;</div>
	



	<div id="container">
	<div id="selectrestaurant">

	

                  
                   <?php

                   
                    echo "<h1>". $_SESSION['restaurantName']  . "</h1>";
                    

                   ?>
	

              
		


	</div>
	<div id="subnav">
		
	<ul>
		<li><a href="tafelindeling.php">Tafelindeling </a></li>
		<li><a href="menus.php">Menu's </a></li>
		<li><a href="reservatie.php">Reservatie </a></li>
		<li><a href="kiesrestaurant.php">Restaurants</a></li>
	
	</ul>
	

	
	
	</div>    <!-- end subnav-->


           
                   		
		<div>
			


			Kies links wat .....
		</div>

		



	
	




	</div> <!-- end div container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
 </body>

 </html>