<?php


$username = "";
$password= "";
include 'db_config.php';
session_start();



$username = $_POST['username1'];
$password = $_POST['password1'];




$q = "SELECT * FROM `user_login` WHERE username = '$username'  ";
$result  = mysqli_query($con,$q);
$user = mysqli_fetch_assoc($result);

// echo "".$q."";

if($user)
{

  if(password_verify($password,$user['password']))
  {
  	
	  $_SESSION['sess_user_id'] = array($user['uid']);
	  $_SESSION['sess_username'] = array($user['username']);
	  $_SESSION['sess_userrole'] = array($user['role']);
	  $_SESSION['sess_email'] = array($user['email']);

// 	  echo $_SESSION['sess_userrole'];
	  session_write_close();

	  if( $_SESSION['sess_userrole'][0] == "admin"){
	   header('Location: https://pharmacopeia.000webhostapp.com/admin.php');
	  }else{
	   header('Location: https://pharmacopeia.000webhostapp.com/products.php');
	  }


  }else{

   header('Location: https://pharmacopeia.000webhostapp.com/regilog.php?err=4');


  }

}else{

	header('Location: https://pharmacopeia.000webhostapp.com/regilog.php?err=1');

}
?>