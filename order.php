<?php
session_start();
include 'db_config.php';
 $role = $_SESSION['sess_userrole'][0];
    if(!isset($_SESSION['sess_username']) || $role!="user"){
      header('Location: regilog.php?err=3');
    }
  $uname = $_SESSION['sess_username'][0];
?>
<?php


$id= $_SESSION['sess_user_id'][0];
$address = $_POST['address'];

$date = strval(date("Y-d-m"));

$check = " SELECT count(order_id) as 'count' FROM `order_table` WHERE user_id = '$id' ";
$results = mysqli_query($con,$check);

if($results)
{
   
	$user = mysqli_fetch_assoc($results);
	if($user['count']>=5){
    
	$discount = 10;
	$bill = $_SESSION['bill'][0] * 0.9;
	}else{

	$discount = 0;
	$bill = $_SESSION['bill'][0];
}

$query1 = "INSERT INTO `order_table` (`user_id`,`address`,`discount`,`total_bill`,`date_placed`) VALUES ('$id','$address','$discount','$bill',CURDATE()) ";

mysqli_query($con,$query1);
	 

}else{
	


$discount = 0;
	$bill = $_SESSION['bill'][0];

$query1 = "INSERT INTO `order_table` (`user_id`,`address`,`discount`,`total_bill`,`date_placed`) VALUES ('$id','$address','$discount','$bill',CURDATE()) ";

mysqli_query($con,$query1);

	
}

$getid = "SELECT order_id  From `order_table` ORDER BY order_id DESC LIMIT 1";
$res= mysqli_query($con,$getid);
if($res)
{
   
	$orderid = mysqli_fetch_assoc($res)['order_id'];

	foreach ($_SESSION as $products) {
		if(count($products)==5)
		{
             
			$pid = $products[3];
			$pprice = $products[1];
			$pqty = $products[2];
			$total = $pprice * $pqty;

			$query2 = "INSERT INTO `cart` (`order_id`,`pid`,`pprice`,`pqty`,`ptotal`) VALUES ('$orderid','$pid','$pprice','$pqty','$total')";
			mysqli_query($con,$query2);

		}
	}
	 

}

foreach ($_SESSION as $products) {
		if(count($products)==5)
		{

			$pid = $products[3];
			$pqnty = mysqli_fetch_assoc(mysqli_query($con,"SELECT pqty FROM `product_table` WHERE pid = '$pid'"))['pqty'] - $products[2];

			
			$update = "UPDATE `product_table` SET pqty = '$pqnty' WHERE pid = '$pid'";
			mysqli_query($con,$update);

		}
	}

foreach ($_SESSION as $products) {
		if(count($products)==5)
		{
			$name=$products[0];
			unset($_SESSION[$name]);

		}
	}

// 		ini_set("SMTP","smtp.gmail.com");
// 		ini_set("smtp_port","587");
		$email = $_SESSION['sess_email'][0];
		
		$to = $email;
		$subject = "Order Confirmed";
		
		$headers = "From: sank20009@gmail.com" ;

		
		$txt  = "Your order is placed successfully.Order id is "."$orderid".".Thank you for shopping with us.";
		mail($to,$subject,$txt,$headers);
 
		header('Location: products.php');
?>