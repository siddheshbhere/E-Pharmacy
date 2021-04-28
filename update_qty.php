<?php

require 'db_config.php';

$id = $_POST['pid1'];
$qty = $_POST['pqty'];


$sql ="UPDATE product_table set pqty ='$qty' where pid = '$id' "; 
mysqli_query($con,$sql);
header('Location:admin.php');
?>