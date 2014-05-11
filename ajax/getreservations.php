<?php
include_once("../classes/Reservation.class.php"); 

$reservation = new Reservation();



$feedback['reservation']	= $reservation->getReservations($_POST['date']);
$feedback['success'] = 1;

 header('Cache-Control: no-cache, must-revalidate'); 
 header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
 header('Content-type: application/json');
echo json_encode($feedback);


?>