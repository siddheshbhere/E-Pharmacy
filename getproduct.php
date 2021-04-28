<?php
session_start();
include 'db_config.php';
$var = $_GET["q"];

if($var=="all")
{
  unset($_SESSION['cat']);
}else{

	$_SESSION['cat']=array($var);
}


?>