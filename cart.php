<?php
session_start();
include 'db_config.php';
 $role = $_SESSION['sess_userrole'][0];
    if(!isset($_SESSION['sess_username']) || $role!="user"){
      header('Location: regilog.php?err=3');
    }
  $uname = $_SESSION['sess_username'][0];
?>
<!DOCTYPE html>
<html style="  width: 1600px;">

<head>
  <meta charset="utf-8">
  <title>Pharmacopoeia</title>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<body>


    <div class="productsBar">
      <nav class="navbar navbar-expand-lg navbar-dark products" style="background-color: #00ad7c;">
        <a class="navbar-brand product-brand" href="index.html">pharmacopoeia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link " href="products.php">Continue Shopping</a>
            </li>
            <li class="nav-item">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-dark" type="submit">Search</button>
              </form>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Antibiotics</a>
                <a class="dropdown-item" href="#">Antacids</a>
                <a class="dropdown-item" href="#">Local anaesthetic</a>
                <a class="dropdown-item" href="#">Diuretics</a>
                <a class="dropdown-item" href="#">Antifungal</a>
                <a class="dropdown-item" href="#">Analgesic</a>
                <a class="dropdown-item" href="#">Expectorants</a>
                <a class="dropdown-item" href="#">Antiemetics</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <?php
 echo'<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello, '.$uname.' </a>';
              ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Your account</a>
                <a class="dropdown-item" href="#">Your orders</a>
                <a class="dropdown-item" href="#">Your wishlist</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="logout.php">Sign Out</a>
            </li>
            <li class="nav-item cart">
              <?php
             $total=0;
             foreach($_SESSION as $products){
                if(count($products)==5)
                {
                $total=$total+$products[2];
                }
             }
              echo '<a class="nav-link " href="cart.html"><i class="fas fa-cart-plus fa-2x"></i><span style="padding-left:10px;">'.$total.'</span></a>';
              ?>
            </li>
          </ul>

        </div>
      </nav>
    </div>



<!-- Products section  -->
<div class="products-container ">
  <div class="product-header row">
    <h5 class="pimg col-lg-1 col-sm-1"></h5>
    <h5 class="product-title col-lg-4 col-sm-4" style="text-align:left; padding-left:15px;">PRODUCT</h5>
    <h5 class="price col-lg-1 col-sm-1" style="text-align:left; padding-left:25px;">PRICE</h5>
    <h5 class="quantity col-lg-2 col-sm-2" style="text-align:left; padding-left:20px;">QUANTITY</h5>
    <h5 class="total col-lg-1 col-sm-1" style="text-align:left; padding-left:35px;">TOTAL</h5>
    <h5 class="remove col-lg-2 col-sm-2"></h5>
  </div>
</div>
<div class="product-section">
<?php 

$bill=0;
foreach($_SESSION as $products)
{
  if(count($products)==5)
  {
  $p=0;
  $q=0;
  $val=0;
  echo "<form action='editCart.php' method='post' id='form1' >";
  echo "<div class='row'>";
  
  foreach ($products as $key => $value) {
    
       
      
        // echo "<img class='dpro1' src='./images/${item.tag}.jpg'>";
                  if($key==0)
                  {
                 
                  // echo "<input type='submit' name='event' value='x' class='btn-danger' >";
                  echo "<div class='pimg col-lg-1 col-sm-1'>";
                  echo "<img  style='width:50%;' src='./images/$products[4]'>";
                  echo "</div>";
                  echo "<div class='product-title col-lg-4 col-sm-4'>";
                  // echo "<input type='submit' name='event' value='Delete' class='btn-danger' >";
                 
                  // <i class='fas fa-times-circle' style='color:#00ad7c; margin-right:5px;'> </i>";
                 
                  echo "<span class='dpro' >".$value."</span>";
                  echo "<input type='hidden' name='name$key' value='$value'></input>";
                  echo "</div>"; 
                  
                  
                  }else if($key==1){
                   echo "<div class='price col-lg-1 col-sm-1'>".$value."</div>";
                   echo "<input type='hidden' name='price$key' value=".$value."></input>";
                   $p=$value;
                 }else if($key==2){
                   $str = $products[0];
                   // echo "$str";
                   echo "<div class='quantity col-lg-2 col-sm-2'>" ; 
                   
          // echo  "<button name='event' value='d' type='submit' form='form1'> <i class='fas fa-arrow-circle-left' style='color:#00ad7c; margin-right:5px;'> </i></button>";
                   echo "<input type='submit' name='event' value='-' class='btn-info'  style ='background-color: #00ad7c;'>";
                   echo "<span style='padding-left:10px; padding-right:10px; '>".$value."</span>";
                   $q= $value;

          // echo  "<button name='event' value='i' type='submit' form='form1'><i class='fas fa-arrow-circle-right' style='color:#00ad7c; margin-right:5px;'> </i></button>";
                   echo "<input type='submit' name='event' value='+' class='btn-info' style ='background-color: #00ad7c;'>";
                   echo "<input type='hidden' name='name2' value='$str'></input>";
                   echo "<input type='hidden' name='qty$key' value=".$q."></input>";
                   echo "<input type='hidden' name='id' value=".$products[3]."></input>";
                   echo "<input type='hidden' name='image' value='$products[4]'></input>";
                   echo "</div>";

                  }
    }


                  $val = $p*$q;
                  echo  "<div class='total col-lg-1'>".$val. "</div>";
                  echo "<input type='submit' name='event' value='Delete' class='btn-danger' style='margin-bottom:5px;margin-left:50px;'>";
                  echo "</div>";
                  $bill+=$val; 
                  echo "</form>"; 

   }   
}

$_SESSION['bill'] = array($bill);
echo "<div class='basketTotalContainer'>";
                  echo  "<h4 class='basketTotalTitle'>Basket Total</h4>";
                  echo "<h4 class='basketTotal'>".$bill."</h4>";
               // echo "<h4 class='basketTotal'>".${cartCost}."</h4>";
            echo  "</div>";
?>
<div style="position:absolute; right:30.5%;" class="check_btn">
<form action="checkout.php" >
  <?php
   if($_SESSION['bill'][0] !=0){
  echo '<input type="submit" name="Proceed" value="Proceed To Payment" class="btn btn-success btn-lg" style="background-color:#00ad7c; color:#fff; margin-top:30px;">';
}
  ?>
</form>
</div>
</div>



</body>

</html>





 