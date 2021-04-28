<?php

session_start();
include 'db_config.php';
$name = $_POST['name'];
$price=$_POST['price'];
$quantity = $_POST['qty'];
$id = $_POST['id'];
$image= $_POST['image'];

$val=0;
if(!empty($_SESSION))
{
foreach ($_SESSION as $products) {

          if($products[0] == $name)
          {
               $val = $products[2];
               $val = $val+1;
               
          }

}
}
if($val==0)
{
      $product = array($name,$price,$quantity,$id,$image);
     
}else{
	  $product = array($name,$price,$val,$id,$image);
      
}
// echo "Product qty is".$product[2]."";
$_SESSION[$name] = $product;


header('location: products.php');

?>