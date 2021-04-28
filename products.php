<?php
session_start();
 $role = $_SESSION['sess_userrole'][0];
    if(!isset($_SESSION['sess_username']) || $role!="user"){
      header('Location: regilog.php?err=3');
    }
  $uname = $_SESSION['sess_username'][0];

 
 include 'db_config.php';
  if(!isset($_SESSION['cat']))
  {
  $query ="SELECT * FROM `product_table`";
  }
  else
  {
    $category = $_SESSION['cat'][0];
    $query = "SELECT * FROM `product_table` WHERE pcat='$category'";
  }
   $result = mysqli_query($con,$query);
   $pro = array();
   while ($row  = mysqli_fetch_assoc($result)) {
   $s=array();
   array_push($s,$row['pimage']);
   array_push($s,$row['pname']);
   array_push($s,$row['pdescription']);
   array_push($s,$row['pform']);
   array_push($s,$row['pcat']);
   array_push($s,$row['pprice']);
   array_push($s,$row['pqty']);
   array_push($s,$row['pid']);
   array_push($pro,$s);                

 }


?>

<!DOCTYPE html>
<html>

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

<body style="min-height: 100vh; display: flex; flex-direction: column;">

  <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn-large btn-dark"><i class="fas fa-angle-double-up fa-2x"></i></i></button>
  <div class="productsBar">
    <nav class="navbar navbar-expand-lg navbar-dark products" style="background-color: #00ad7c;">
      <a class="navbar-brand product-brand" href="#">pharmacopoeia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link " href="index.html">Home </a>
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-dark" type="submit">Search</button>
            </form>
          </li>
          <li class="nav-item dropdown">
            <select style="border: 1px  #fff; background-color: transparent; color: rgba(255,255,255,.5); margin-top: 10px; font-size:1.1rem; width:110px;" onchange="showCategory(this.value)">
              
            
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <option class="dropdown-item" value="Antacid">Category</option>
              <option class="dropdown-item" value="all">All</option>
              <option class="dropdown-item" value="Antibiotic">Antibiotics</option>
              <option class="dropdown-item" value="Antacid">Antacids</option>
              <option class="dropdown-item" value="Local anaesthetic">Local anaesthetic</option>
              <option class="dropdown-item" value="Diuretics">Diuretics</option>
              <option class="dropdown-item" value="Anti-allergic">Anti-Allergic</option>
              <option class="dropdown-item" value="Analgesic/antipyretic">Analgesic</option>
              <option class="dropdown-item" value="Expectorant">Expectorants</option>
              <option class="dropdown-item" value="Antiemetic">Antiemetics</option>
            </div>
            </select>
          </li>
          <li class="nav-item dropdown">
                       <?php
 echo'<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello, '.$uname.' </a>';
              ?>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Your account</a>
              <a class="dropdown-item" href="user_order.php">Your orders</a>
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
              echo '<a class="nav-link " href="cart.php"><i class="fas fa-cart-plus fa-2x"></i><span style="padding-left:10px;">'.$total.'</span></a>';
              ?>
          </li>
        </ul>

      </div>
    </nav>
   
  </div>
  
 </div>
   <?php
 
  for ($row=0;$row<count($pro);$row++)
  {  
  echo '<form action="insert_cart.php" method="post">';
  echo '<div class="media">';
  $str = $pro[$row][0];
  $str1= $pro[$row][1];
  $qty = $pro[$row][6];
  if(isset($_SESSION[$str1]))
  { 
  $qty = $pro[$row][6]  -  $_SESSION[$str1][2];

  }
  echo "<img class='medpic' src='images/$str' alt='...'>";
  echo  '<div class="media-body" class="img-zoom-result">';
  echo    '<h2 class="mt-0">'.$pro[$row][1].'</h2>';
  echo    '<h5 class="mt1">Medical Description:</h5>';
  echo   '<p>'.$pro[$row][2].'</p>';
  echo    '<h5 class="mt1">Composition:</h5>';
  echo    '<p>'.$pro[$row][3].'</p>';
  echo    '<h5 class="mt1">Category:</h5>';
  echo    '<p>'.$pro[$row][4].'</p>';
  echo    '<h6 class="mt2">Price: ₹ '.$pro[$row][5].'</h6>';
  echo    '<h6 class="mt2">Stock: '.$qty.'</h6>';
  echo    '<!-- <a href="#" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">Add to Cart</a> -->';
  echo    '<input type="submit" name="addcart" value="Add To Cart" class="btn btn-lg add-cart" style="background-color:#00ad7c; color:#fff;">';
  echo    '<input type="hidden" name="price" value='.$pro[$row][5].'>';
  echo    '<input type="hidden" name="id" value='.$pro[$row][7].'>';
  echo    '<input type="hidden" name="qty" value="1">';
  echo   "<input type='hidden' name='name' value='$str1'>";
  echo   "<input type='hidden' name='image' value='$str'>";
  echo  '</div>';
  echo '</div>';
  echo '</form>';
  
 
}
?>
  
  <!-- Footer -->

  <footer id="footer" style="margin-top: auto;">
    <i class="social-icon fab fa-facebook-f fa-2x"></i>
    <i class="social-icon fab fa-twitter fa-2x"></i>
    <i class="social-icon fab fa-instagram fa-2x"></i>
    <i class="social-icon fas fa-envelope fa-2x"></i>
    <p style="color:#fff;">© Copyright 2020 Pharmacopoeia</p>

  </footer>

  <!-- <script src="js/cart.js"></script> -->
  <script src="js/anime.js"></script>
  <script >
    
  
function showCategory(str) {
  var xhttp;
 
  xhttp = new XMLHttpRequest();
 
  xhttp.open("GET", "getproduct.php?q="+str, true);
  xhttp.send();
  document.getElementById("txtHint").innerHTML = str;
  self.location.reload(true);
//   $.ajax({  
//     type: 'POST',  
//     url: 'getproduct.php', 
//     data: { q: str },
//     success: function(responsedata) {
//         $('#textHint').html(responsedata);
//     });
 }
  </script>
</body>

</html>
