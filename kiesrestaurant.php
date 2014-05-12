<?php

include_once('classes/Restaurant.class.php');
session_start();
if($_SESSION['loggedin']==false)
{
	header("Location: index.php");
	exit();
}
$restaurant = new Restaurant();
if (isset($_POST['btnAdd'])){


if (!empty($_POST['name']))
{

	try {

	$restaurant->Name 				= $_POST['name'];
	$restaurant->City 				= $_POST['city'];
	$restaurant->Street 			= $_POST['street'];
	$restaurant->StreetNumber		= $_POST['number'];
	$restaurant->PhoneNumber 		= $_POST['phonenumber'];
	$restaurant->PostalCode 		= $_POST['postcode'];
	$restaurant->OwnerId 			= $_SESSION['ownerid'];
	
	$restaurant->insert();

	 } catch (Exception $e) {
    
      $feedback = $e->getMessage();
      echo $feedback;

    }
}

}
if (isset($_POST['btnProceed'])){
$_SESSION['restaurantId'] = $_POST['selectrestaurant'];
$restaurantName = $restaurant->getRestaurantName($_POST['selectrestaurant']);
$_SESSION['restaurantName'] = $restaurantName;

if ($_SESSION['loggedin'])
	{
		header("Location: dashboard.php");
		exit();
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
	<a href="dashboard.php"><img src="images/logodik.png" alt="logoklein">	</a>
	
	<?php echo "<p class='user'> Welkom ". $_SESSION['ownerName'] . " </p>" ?>

	</div> <!-- end div login-->
	<div class="clearfix">&nbsp;</div>
	<div id="chooserestaurant">
		

	<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

	<label for="selectrestaurant"> Selecteer je restaurant</label> 

            <select class='select' id="selectrestaurant" name = "selectrestaurant"> 
                  
                   <?php

                   $result_array = $restaurant->getRestaurants($_SESSION['ownerid']);
					print_r($result_array);
                    foreach ($result_array as $resto){
                    echo "<option value='". $resto['RestaurantId'] . "'>". $resto['Name'] ."</option>";

                    }

                   ?>
                   		
			
			<input class="restaurantbtn" type="submit" value=" Verder gaan" name = "btnProceed">

			


				<!--Hier moeten de restaurants die bij de persoon horen, uit de database gehaald worden -->

             </select>
				

             </form>

             <a href="#" class="toggle">Voeg een restaurant toe</a>
         </div> <!-- end chooserestaurant-->

			
             <div id="addrestaurant">
             <form action="" method="post">
			<input type="text" name="name" placeholder="Naam" required/>
		
		<input type="text" name="street" placeholder="Straat" required/>
		<input type="text" name="number" placeholder="Huisnummer" required/>
		<input type="text" name="postcode" placeholder="Postcode" required/>
		<input type="text" name="city" placeholder="Plaats" required/>
		<input type="text" name="phonenumber" placeholder="Gsm-nummer" required/>

			<input class="voegtoebtn" type="submit" value="restaurant toevoegen" name = "btnAdd">

		</form>
		

		</div> <!-- end add restaurant -->
	
		<div class="feedback">



		</div>




	<div id="container">

	
	
	




	</div> <!-- end div container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
 </body>

 </html>