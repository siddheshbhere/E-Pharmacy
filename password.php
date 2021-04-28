<?php
session_start();
include 'db_config.php';
$errors = array();
$email = $_POST['email'];

$query = "SELECT * FROM `user_login` WHERE email ='$email' LIMIT 1";
$row = mysqli_fetch_assoc(mysqli_query($con,$query));

if($row)
{
	if($email=$row['email'])
	{
		
		$_SESSION['email']=$row['email'];
		$to = $email;
		$subject = "Password Reset";
		
		$headers = "From: sank20009@gmail.com" . "\r\n" .
		"CC: 2018.siddhesh.bhere@ves.ac.in";

		
		$txt  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
		<body>

		<div>
		        
		        <p>Please click the following link to reset the password "<a href =https://pharmacopeia.000webhostapp.com/new_pass.php">reset_password</a>"</p>


		</div>
		</body>
		</html>';
		mail($to,$subject,$txt,$headers);
	}
}else{
	array_push($errors,"Invalid email id");
	echo "".$errors[0]."";
}


?>