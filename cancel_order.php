<?php
session_start();
include 'db_config.php';

$oid = $_POST['oid'];

$cancel = "DELETE FROM order_table WHERE order_id ='$oid'";
mysqli_query($con,$cancel);
// ini_set("SMTP","smtp.gmail.com");
// 		ini_set("smtp_port","587");
		$email = $_SESSION['sess_email'][0];
		$to = $email;
		$subject = "Order Cancelled";
		
		$headers = "From: sank20009@gmail.com" ;

		
		$txt  = "Your order is cancelled successfully.Cancellation id is "."$oid".".Thank you for shopping with us.";
		mail($to,$subject,$txt,$headers);
 
		
header('Location: user_order.php');

?>