<?php




$username = "";
$email = "";
include 'db_config.php';
$errors=array();

$username = mysqli_real_escape_string($con,$_POST['name']);
$email= mysqli_real_escape_string($con,$_POST['email']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$password = mysqli_real_escape_string($con,$_POST['password']);


$user_check_query = "SELECT * FROM `user_login` WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($con,$user_check_query);
$user = mysqli_fetch_assoc($results);


if($user)
{
	if($user['username']===$username){
		array_push($errors,'aa');
		header('Location: regilog.php?err=5');
	}
	if($user['email']===$email){
		array_push($errors,'aa');
		header('Location: regilog.php?err=6');
	}
	
}

if(count($errors)== 0)
{

	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = "INSERT INTO `user_login` (`username`,`email`,`mob`,`password`) VALUES ('$username','$email','$phone','$password')";

	mysqli_query($con,$query);
    header('Location: regilog.php?err=7');
}



?>