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
	<div id="chooserestaurant">
		

	<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">

	<label for="chooserestaurant"> Selecteer je restaurant</label> 

            <select class='select' id="selectrestaurant"> 
                   
                      <option value="Restaurant1"> Restaurant 1</option>
					  <option value="Restaurant2"> Restaurant 2</option>

					  <!--
					  <input class='btn' type="radio" name="restaurant1" value="male">Restaurant 1
					  <input class='btn' type="radio" name="restaurant2" value="restaurant2">Restaurant2
						-->
			
			<input class="restaurantinput" type="text" Placeholder="voeg een restaurant toe">
			<input class="voegtoebtn" type="submit" value="+">
			<input class="restaurantbtn" type="submit" value=" Verder gaan">

			


				<!--Hier moeten de restaurants die bij de persoon horen, uit de database gehaald worden -->

             </select>


	</form>




	</div>
	<div id="container">

	
	
	




	</div> <!-- end div container -->
 </body>
 </html>