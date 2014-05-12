<?php

include_once('classes/Tables.class.php');
session_start();

$table = new Table();
if (isset($_POST['btnAdd'])){



if (!empty($_POST['name']))
{

	try {


	$table->Name 				= $_POST['name'];
	$table->numberOfSeats 		= $_POST['numberOfSeats'];
	
	$table->insert();

	 } catch (Exception $e) {
    
      $feedback = $e->getMessage();
      
}
if (isset($_POST['btnProceed'])){
$_SESSION['restaurantId'] = $_POST['selectrestaurant'];

}



?>

<html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Restorapp Tafel</title>
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
		


	</div> <!-- end select redtaurant -->
	

	<div id="subnav">
		
	<ul>
		<li><a href="tafelindeling.php">Tafelindeling </a></li>
		<li><a href="menus.php">Menu's </a></li>
		<li><a href="reservatie.php">Reservatie </a></li>
	
	</ul>
	
		</div>    <!-- end subnav-->


	
	<div id="tables" class="content">

		 <div id="addTable">
             <form action="" method="post">
		<input type="text" name="name" placeholder="Naam" required/>
		<input type="text" name="numberOfSeats" placeholder="Aantal plaatsen" required/>

			<input class="voegtoebtn" type="submit" value="Tafel Toevoegen" name = "btnAdd">

		</form>
		

		</div> <!-- end add restaurant -->


	</div> <!-- end tables --> 

	</div> <!-- end div container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
 </body>

 </html>
