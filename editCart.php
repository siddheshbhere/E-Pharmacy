<?php

session_start();
$name = $_POST['name0'];
$n = $_POST['name2'];
$price = $_POST['price1'];
$event =$_POST['event'];
$qty = $_POST['qty2'];
$id = $_POST['id'];
$image = $_POST ['image'];
// echo "$n";
if($event=='Delete')
{
 
 
 unset($_SESSION[$name]);
}
else if($event=="+"){

     $qty++;
     $product = array($n,$price,$qty,$id,$image);
     $_SESSION[$n] = $product;

    //  echo "".$qty."";
}
else if($event=='-'){

     $qty--;
    //   echo "".$qty."";
     if($qty==0)
     {
		unset($_SESSION[$n]);
     }else if($qty>0){

     $product = array($n,$price,$qty,$id,$image);
     $_SESSION[$name] = $product;

     }
}



header('location: cart.php');
?>