<?php 
 include_once("../classes/Menu.class.php"); 
 
 $menu = new Menu(); 
 $feedback = array(); 
 
 //controleer of er een update wordt verzonden 
 if(!empty($_POST['item'])) 
 { 
 try 
 { 

 $menu->Item			= $_POST['item']; 
 $menu->Price 			= $_POST['price']; 
 $menu->Type 			= $_POST['type'];
 $menu->RestaurantId	= $_POST['restaurantId'];
 $menu->insertItem(); 
 $feedback['message']	 	= "item is toegevoegd"; 
 $feedback['status'] 		= true; 
 } 
 catch (Exception $e) 
 { 
 $feedback['message'] 		 = $e->getMessage(); 
 $feedback['status']		 = false; 
} 
 header('Cache-Control: no-cache, must-revalidate'); 
 header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
 header('Content-type: application/json');
 echo json_encode($feedback); 
 } 
?> 
