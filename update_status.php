<?php
include 'db_config.php';

$oid = $_POST['oid1'];
$status = $_POST['status'];

// echo ''.$status.'';
	$sql ="UPDATE order_table set order_status ='$status' where order_id = '$oid' "; 
	mysqli_query($con,$sql);
	header('Location:admin.php');


?>