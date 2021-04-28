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
            <select style="border: 1px  #fff; background-color: transparent; color: rgba(255,255,255,.5); margin-top: 10px; font-size:1.1rem;width:110px;" onchange="showCategory(this.value)">
              
            
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
<div class="card mb-3" style="z-index: 1;">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Order Status</div>
    <div class="card-body">
      <div class="table-responsive">
         <?php
              $uid = $_SESSION['sess_user_id'][0]; 
              $sql2 = "SELECT * FROM `order_table` where user_id = '$uid' ";
              

               $query2 = mysqli_query($con,$sql2);

        echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background: rgba(100, 100, 100, 0.3);">';
                echo        '<thead>';
                echo          '<tr>';
                echo           ' <th>Order ID</th>';
                echo            '<th>Date Placed</th>';
                echo           ' <th>Status</th>';
                echo       '   <th>Amount</th>   ';
                
                  echo       '   <th>Cancel</th>   ';
                
                echo       '   </tr>';
                echo       ' </thead>';
                echo       ' <tfoot>';
                echo       '   <tr>';
                echo           ' <th>Order ID</th>';
                echo            '<th>Date Placed</th>';
                echo           ' <th>Status</th>';
                echo       '   <th>Amount</th>   ';
                
                  echo       '   <th>Cancel</th>   ';
                
                echo       '   </tr>';
                echo       ' </tfoot>';
                echo       '<tbody>';
                echo '<form action="cancel_order.php" method="POST">';
              while($result2=mysqli_fetch_assoc($query2))
        { 
          
                
                echo  '<tr>';
                echo    '<td>'.$result2['order_id'].'</td>';
                echo    '<td>'.$result2['date_placed'].'</td>';
                echo    '<td>'.$result2['order_status'].'</td>';
                echo    '<td>'.$result2['total_bill'].'</td>';
                if($result2['order_status']=='ORDERED')
                {
                  echo       '   <td><input type = "submit" class="btn btn-sm btn-danger" value="Cancel" > </td>   ';
                  echo '<input type="hidden" name="oid" value='.$result2['order_id'].'>';
                }
                echo  '</tr>';
               
        }
        echo '</form>';
              
                echo "</tbody>";
            echo "</table>";

              ?>
      </div>
    </div>
  </div>
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
  
</body>

</html>