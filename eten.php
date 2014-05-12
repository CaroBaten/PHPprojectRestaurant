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


    <div id="foodmenu">       
    <h2>Eetmenu</h2>               	
	<table id="listfoodmenu">
				
		<tr class="highlight">
		  <th>Gerecht</th>
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

		<input class="voegtoebtn" id="btnAdd" type="submit" value="Drank toevoegen" name = "btnAdd">

		</form>


	</div>

	</div> <!-- end div listdrinkmenu -->



	
	




	</div> <!-- end div container -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="js/interaction.js"></script>
 </body>

 </html>