<?php


include_once('classes/Menu.class.php');
session_start();
$menu = new Menu();
$menu->Type = "drank";
$allDrinks = $menu->getMenu($_SESSION['restaurantId']);


if($_SESSION['loggedin']==false)
{
	header("Location: index.php");
	exit();
}


if (isset($_POST['delete']))
{
$menu->deleteItem($_POST['itemid']);
header('Location: '.$_SERVER['REQUEST_URI']);
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
	<a class="user" id="logout" href="logout.php">Log out</a>
	
	
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


<div class="content">
		<div id="tablewrapper" class="content">

		 <div id="addTable">
     		<form action="" method="post">
    <input type="text" id ="name" name="name" placeholder="Naam" required/>
    <input type="text" id ="price" name="price" placeholder="Prijs" required/>
      <?php echo "<input type='text' id='restaurantId' name='restaurantId' hidden value='". $_SESSION['restaurantId'] . "'/>";  ?>
    <input class="voegtoebtn" id="btnAdd" type="submit" value="Drank toevoegen" name = "btnAdd">

    </form>	
		</div> <!-- end tablewrapper-->
<div class="clearfix">&nbsp;</div>
		</div> <!-- end table -->
  
   </div>
   
		<div id="tables" class="content">
		<h2>Drankmenu</h2>
		
   <section id="rows">

<table id="listdrinkmenu">
 <tr class="highlight">
      <th>Drank</th>
      <th>Prijs</th> 
      <th>Verwijderen</th>
    </tr>

<?php
      foreach ($allDrinks as $d){
      echo "  <tr class='highlight'>";
      echo "<td>" . $d['Item'] . "</td>";
      echo "<td>" . $d['Price'] . "</td>";
      echo "<td> <form action='' method='post'><input type='text' name='itemid' value='".$d['Item']. "' hidden><input type='submit' id='delete' name ='delete' value='delete'></form></td>";
      echo "</tr>";
      }
      ?>
</table>
   </section>    		
		</div> <!-- end tables-->


	</div>
			

			
		
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
 var update = "";
			
 			
				update+= "<tr class='highlight'>";
				update +=  "<td> " + item + "</td>" ;
				update +=  "<td> " + price + "</td>" ;
				update += "<td> <form action='' method='post'><input type='text' name='itemid' value='" + item + "' hidden><input type='submit' id='delete' name ='delete' value='delete'></form></td>";
				update += "</tr>";	
					
		$( "#listdrinkmenu" ).append(update);
 			
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