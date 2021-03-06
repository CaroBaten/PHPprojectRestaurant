<?php

include_once('classes/Restaurant.class.php');
include_once('classes/Reservation.class.php');
session_start();
if($_SESSION['loggedin']==false)
{
	header("Location: index.php");
	exit();
}
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
     

    }
}

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
	<a class="user" id="logout" href="logout.php">Log out</a>
	
	
	<?php echo "<p class='user'> Welkom ". $_SESSION['ownerName'] . " </p>" ?>
	</div> <!-- end div login-->
	<div class="clearfix">&nbsp;</div>
	



	<div id="container">
	<div id="selectrestaurant">
				<?php                 
                    echo "<h3>". $_SESSION['restaurantName']  . "</h3>";
                                      ?>


	</div>
	<div id="subnav">
		
	<ul>
		<li><a href="tafelindeling.php">Tafelindeling </a></li>
		<li><a href="menus.php">Menu's </a>
				<ul id="menusubmenu">
						<li><a href="drank.php">Drankmenu</a></li>
						<li><a href="eten.php">Gerechten</a></li>
					</ul>
				</li>
	
		<li><a href="reservatie.php">Reservatie </a></li>
		<li><a href="kiesrestaurant.php">Restaurants</a></li>
	
	</ul>
	

	
	
	</div>    <!-- end subnav-->


    <div class="content">
    <div id="feedback">
	<?php 
	if (isset($feedback)){
		echo "<p> " . $feedback . "</p>";
	}

	  ?>
	</div>
	<div id="reservationwrapper">
	<form id= "addreservation" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

	<label for="date">Datum </label>
	<input type="date" id="date" name="date">

	<label for="starthour"> Start uur </label>
	<input type="time" id="starthour" name="starthour">

	<label for="endhour"> Einduur </label>
	<input type="time" id="endhour" name="endhour">

	<label for="reservationname">Naam</label>
	<input type="text" id="reservationname" name="reservationname">
	
	<label for="phonenumber"> Telefoonnummer </label>
	<input type="text" id="phonenumber" name="phonenumber">


	<label for="numberofpeople">Aantal personen</label>
	<input type="text" id="numberofpeople" name="numberofpeople">
	
	
	<input class="btn" type="submit" name="sendreservation" value="Reserveren">
	</form>
	</div> <!-- end reservationwrapper-->
<div class="clearfix">&nbsp;</div>
	

<div id="reservations">
	
	<h2>Overzicht van reservaties</h2>

	<section id="rows">


	</section>
	
	</div>   <!-- end reservation -->



   </div>     <!-- end content -->
                   		
		

		
	</div> <!-- end div container -->


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="js/interaction.js"></script>

 <script>
$(document).ready(function(){ 
	console.log("ready");
$('#date').change(function() { 
	

 ajaxCall();
    return(false);
});
	 });

function ajaxCall()

{

 var val = $( "#date" ).val();

 var dataString = "date="+val;
console.log(dataString);

$.ajax({ 
 type: "POST", 
 url: "ajax/getreservations.php", 
 data: dataString, // values to submit 
 success: function(msg) { 
 // what to do when call succeeds 
 if(msg.success == 1){
console.log("success");
var update = "";
			update += "<table id='listreservations' >";
 			update+="<tr class='highlight'>";
		  	update += "<th>Naam</th>";
		  	update += "<th>Aantal</th>"; 
		    update+= "<th>Startuur</th>";
		  	update += "<th>Einduur</th>";
		  	update += "<th>Telefoonnummer</th>";
		update += "</tr>";
 			for(var i = 0; i < msg.reservation.length ; i++){
				update+= "<tr class='highlight'>"
				update +=  "<td> " + msg.reservation[i][1] + "</td>" ;
				update +=  "<td> " + msg.reservation[i][2] + "</td>" ;
				update +=  "<td> " + msg.reservation[i][4] + "</td>" ;
				update +=  "<td> " + msg.reservation[i][5] + "</td>" ;
				update +=  "<td> " + msg.reservation[i][6] + "</td>" ;	
				update += "</tr>"	
				}
			update +="</table>";
		$("#reservations").show();
		$( "#rows" ).html(update);
	
  }else{


  }
 }, 
 error: function() { 
 // what to do when call fails 
 
 } 
 });

}


 </script>
 </body>

 </html>