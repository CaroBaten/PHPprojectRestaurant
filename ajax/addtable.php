<?php 
 include_once("../classes/Tables.class.php"); 
 $table = new Table(); 
 $feedback = array(); 
 
 //controleer of er een update wordt verzonden 
 if(!empty($_POST['name'])) 
 { 
 try 
 { 
 $table->Name 			= $_POST['name']; 
 $table->NumberOfSeats 	= $_POST['numberOfSeats']; 
 $table->RestaurantId	= $_POST['restaurantId'];
 $table->AddTable(); 
 $feedback['message'] = "Tafel is toegevoegd"; 
 $feedback['status'] = true; 
 } 
 catch (Exception $e) 
 { 
 $feedback['message'] = $e->getMessage(); 
 $feedback['status'] = false; 
} 
 header('Cache-Control: no-cache, must-revalidate'); 
 header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
 header('Content-type: application/json');
 echo json_encode($feedback); 
 } 
?> 
