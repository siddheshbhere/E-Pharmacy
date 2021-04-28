<?php
session_start();
include 'db_config.php';
if(isset($_SESSION['email']))
{

	$email = $_SESSION['email'];
	$password = $_POST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = "UPDATE user_login set password = '$password' WHERE email = '$email' ";
	mysqli_query($con,$query);
// 	echo "password reset successful";
	session_destroy();
	header('Location: regilog.php');
}else{
	header('Location: index.html');
}


?>