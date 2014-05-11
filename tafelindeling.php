<?php

include_once('classes/Restaurant.class.php');
session_start();

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

	
	
	<p class="user"> Welkom    </p> <!-- hier moet de naam van de user verschijnen -->

	</div> <!-- end div login-->
	<div class="clearfix">&nbsp;</div>
	



	<div id="container">
	<div id="selectrestaurant">

		<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
 <select class='selectnav' id="selectrestaurant"> 
                  
                   <?php

                   $result_array = $restaurant->getRestaurants($_SESSION['ownerid']);
					print_r($result_array);
                    foreach ($result_array as $resto){
                    echo "<option value='". $resto['Name'] . "'>". $resto['Name'] ."</option>";
                    }

                   ?>
		</select>

               </form>
		


	</div>
	<div id="subnav">
		
	<ul>
		<li><a href="tafelindeling.php">Tafelindeling </a></li>
		<li><a href="menus.php">Menu's </a></li>
		<li><a href="reservatie.php">Reservatie </a></li>
	
	</ul>
	

	
	
	</div>    <!-- end subnav-->


           
                   		
		

		



	
	




	</div> <!-- end div container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
 </body>

 </html>