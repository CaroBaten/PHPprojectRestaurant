<?php

include_once('classes/Restaurant.class.php');
include_once('classes/Reservation.class.php');
session_start();

$restaurant = new Restaurant();
$reservation = new Reservation();


if (isset($_POST['sendreservation']))
{


	try {

	$reservation->Name 					= $_POST['reservationname'];
	$reservation->PhoneNumber 			= $_POST['phonenumber'];
	$reservation->Date 					= $_POST['date'];
	$reservation->StartHour				= $_POST['starthour'];
	$reservation->EndHour 				= $_POST['endhour'];
	$reservation->NumberOfPeople 		= $_POST['numberofpeople'];
	$reservation->RestaurantId 			= $_SESSION['restaurantId'];
	
	$reservation->makeReservation();

	 } catch (Exception $e) {
    
      $feedback = $e->getMessage();
      echo $feedback;

    }
}

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


    <div id="content">

	<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

	<label for="reservationname">Naam</label>
	<input type="text" id="reservationname" name="reservationname">
	
	<label for="phonenumber"> Telefoonnummer </label>
	<input type="text" id="phonenumber" name="phonenumber">

	<label for="date">Datum </label>
	<input type="date" id="date" name="date">

	<label for="starthour"> Start uur </label>
	<input type="time" id="starthour" name="starthour">

	<label for="endhour"> Einduur </label>
	<input type="time" id="endhour" name="endhour">

	<label for="numberofpeople">Aantal personen</label>
	<input type="text" id="numberofpeople" name="numberofpeople">
	
	
	<input class="btn" type="submit" name="sendreservation" value="Reserveren">
	</form>







   </div>
                   		
		

		



	
	




	</div> <!-- end div container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
 
 </body>

 </html>