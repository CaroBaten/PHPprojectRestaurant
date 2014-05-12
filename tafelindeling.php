<?php

include_once('classes/Restaurant.class.php');
include_once('classes/Tables.class.php');
session_start();
if($_SESSION['loggedin']==false)
{
	header("Location: index.php");
	exit();
}
$restaurant = new Restaurant();
$table = new Table();

$allTables = $table->getTables($_SESSION['restaurantId']);
/*
if (isset($_POST['btnAdd']))
{
$table->Name 			= $_POST['name'];
$table->NumberOfSeats 	= $_POST['numberOfSeats'];
$table->RestaurantId	= $_SESSION['restaurantId'];

$table->AddTable();
}

*/


?><html lang="en">
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
	



	<div id="container">
	<div id="restaurantselect">

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


		<div id="tables" class="content">

		 <div id="addTable">
             <form action="" method="post">
		<input type="text" id ="name" name="name" placeholder="Naam" required/>
		<input type="text" id ="numberOfSeats" name="numberOfSeats" placeholder="Aantal plaatsen" required/>
		<?php echo "<input type='text' id='restaurantId' name='restaurantId' hidden value='". $_SESSION['restaurantId'] . "'/>";  ?>
			<input class="voegtoebtn" id="btnAdd" type="submit" value="Tafel Toevoegen" name = "btnAdd">

		</form>
		
			<ul id="tables">
 <?php
/*
   foreach ($allTables as $t){
  //alle tafels moeten hier komen
                  
    }
*/
 ?>

    </ul>  
		

		</div> <!-- end add restaurant -->
  
   </div>
                   		
		

		
	</div> <!-- end div container -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
<script>

$(document).ready(function(){ 
	console.log("ready");
 $( "#btnAdd" ).click(function() {
 	console.log("clicked");
 var name = $( "#name" ).val();
 var numberOfSeats = $( "#numberOfSeats" ).val();
 var restaurantId = $( "#restaurantId" ).val();
 var dataString = "name="+name + "&numberOfSeats=" + numberOfSeats;

 console.log(dataString);


//SUBMIT DATA USING AJAX CALL 
 $.ajax({ 
 type: "POST", 
 url: "ajax/addtable.php", // ajax/facebook-status-update.php 
 data: { 
        'name': name, 
        'numberOfSeats': numberOfSeats,
        'restaurantId': restaurantId
    }, // values to submit 
 success: function(msg) { 
 // what to do when call succeeds 
 
 console.log("success");
 //tafel moet in li komen
 			
 },
 error: function() { 
 // what to do when call fails 
 console.log("fail");
 } 
 });
 
 
 return(false); //AVOID PAGE RELOAD WHEN CLICKING ON SUBMIT BUTTON 
 }); 
}); 

</script>


 
 </body>

 </html>