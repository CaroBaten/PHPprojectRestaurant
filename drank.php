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
	<a href="dashboard.php"><img src="images/logodik.png" alt="logoklein">	</a>

	
	
	<?php echo "<p class='user'> Welkom ". $_SESSION['ownerName'] . " </p>" ?>

	</div> <!-- end div login-->
	<div class="clearfix">&nbsp;</div>
	



	<div id="container">
	<div id="restaurantselect">
              <?php                 
                    echo "<h3>". $_SESSION['restaurantName']  . "</h3>";
                                      ?>
	</div>


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


    <div id="drinkmenu">       
    <h2>Drankmenu</h2>               	
	<table id="listdrinkmenu">
				
		<tr class="highlight">
		  <th>Drank</th>
		  <th>Prijs</th> 
		  <th>Verwijderen</th>
		</tr>

		<tr class="highlight">
			<td>Sprite</td>
			<td>1,8</td>
			<td> <img src="images/delete.png" alt=""></td>

		</tr>
	
	


	</table>	

		 <div id="addDrink">
             <form action="" method="post">
		<input type="text" id ="name" name="name" placeholder="Naam" required/>
		<input type="text" id ="price" name="price" placeholder="Prijs" required/>
			<?php echo "<input type='text' id='restaurantId' name='restaurantId' hidden value='". $_SESSION['restaurantId'] . "'/>";  ?>
		<input class="voegtoebtn" id="btnAdd" type="submit" value="Drank toevoegen" name = "btnAdd">

		</form>


	</div>

	</div> <!-- end div listdrinkmenu -->



	
	




	</div> <!-- end div container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
 <script>

$(document).ready(function(){ 
	console.log("ready");
 $( "#btnAdd" ).click(function() {
 	console.log("clicked");
 var item = $( "#name" ).val();
 var price = $( "#price" ).val();
 var restaurantId = $( "#restaurantId" ).val();
 

 console.log(item + " " + price);


//SUBMIT DATA USING AJAX CALL 
$.ajax({ 
 type: "POST", 
 url: "ajax/additem.php", // ajax/facebook-status-update.php 
 data: { 
        'item': item, 
        'price': price,
        'type': 'drank',
        'restaurantId': restaurantId
    }, // values to submit 
 success: function(msg) { 
 // what to do when call succeeds 
 
 console.log("success");
 
 			
 },
 error: function() { 
 // what to do when call fails 
 
 } 
 });
//AVOID PAGE RELOAD WHEN CLICKING ON SUBMIT BUTTON 
return(false);
 }); 


}); 

</script>
 </body>

 </html>