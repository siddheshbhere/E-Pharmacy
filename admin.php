<?php

 include 'db_config.php';
 session_start();
 $role = $_SESSION['sess_userrole'][0];
    if(!isset($_SESSION['sess_username']) || $role!="admin"){
      header('Location: regilog.php?err=2');
    }


$mycount = "SELECT count(*) as 'customer' FROM user_login where role= 'user';";
$mycount .=   "SELECT count(*) as 'products' FROM product_table ;";
$mycount .=  "SELECT count(*) as 'orders' FROM order_table;";
$mycount .=  " SELECT count(*) as 'Delivery' FROM order_table WHERE order_status = 'DELIVERED'" ;
mysqli_multi_query($con,$mycount);
         


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Pharmacopoeia</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/admin.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  <script>
    $(document).ready(function() {
      $(".hamburger").click(function() {
        $(".wrapper").toggleClass("active")
      })
    });
  </script>
  
</head>

<body>

  <div class="wrapper">

    <div class="top_navbar">
      <div class="logo">
        <a href="#">Pharmacopoeia</a>
      </div>
      <div class="top_menu">
        <div class="home_link">
          <a href="index.html">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span>Home</span>
          </a>
        </div>
        <div class="right_info">
          <!-- <div class="icon_wrap">
            <div class="icon">
              <i class="fas fa-bell"></i>
            </div>
          </div> -->
          <div class="icon_wrap" >
            <div class="icon" >
              <a href="logout.php"><i class="fas fa-sign-out-alt" style="color: #fff;"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main_body">

      <div class="sidebar_menu">
        <div class="inner__sidebar_menu">

          <ul>
            <li>
              <a href="#">
                <span class="icon">
                  <i class="fas fa-border-all"></i></span>
                <span class="list">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#" class="active">
                <span class="icon"><i class="fas fa-chart-pie"></i></span>
                <span class="list">Charts</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="color:#000;">
                <h6 class="dropdown-header" style="color:#000;">Login Screens:</h6>
                <a class="dropdown-item" href="regilog.html">Login / Register</a>
                <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header" style="color:#000;">Other Pages:</h6>
                <a class="dropdown-item" href="products.html">Products Page</a>
                <a class="dropdown-item" href="cart.html">Cart Page</a>
              </div>
            </li>
            <li>
              <a href="#">
                <span class="icon"><i class="fas fa-address-book"></i></span>
                <span class="list">Contact</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="icon"><i class="fas fa-address-card"></i></span>
                <span class="list">About</span>
              </a>
            </li>
          </ul>

          <div class="hamburger">
            <div class="inner_hamburger">
              <span class="arrow">
                <i class="fas fa-long-arrow-alt-left"></i>
                <i class="fas fa-long-arrow-alt-right"></i>
              </span>
            </div>
          </div>

        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100 shadow-lg">
              <div class="card-body" style="text-align:center;">
                <div class="card-body-icon">
                  <i class="fas fa-users fa-2x"></i>
                </div>
                <div>Customers</div>
                <div><span><?php 
                $row = mysqli_store_result($con);
                $get = mysqli_fetch_row($row);
                mysqli_free_result($row);
                echo ''.$get[0].'';  
                mysqli_next_result($con)
                ?></span></div>
              </div>

            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100 shadow-lg">
              <div class="card-body" style="text-align:center;">
                <div class="card-body-icon">
                  <i class="fas fa-pills fa-2x"></i>
                </div>
                <div>Products</div>
                <div><span><?php 
                $row = mysqli_store_result($con);
                $get = mysqli_fetch_row($row);
                mysqli_free_result($row);
                echo ''.$get[0].'';  
                mysqli_next_result($con)  ?></span></div>
              </div>

            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100 shadow-lg">
              <div class="card-body" style="text-align:center;">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart fa-2x"></i>
                </div>
                <div>Orders</div>
                <div><span><?php 
                $row = mysqli_store_result($con);
                $get = mysqli_fetch_row($row);
                mysqli_free_result($row);
                echo ''.$get[0].'';  
                mysqli_next_result($con) ?></span></div>
              </div>

            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100 shadow-lg">
              <div class="card-body" style="text-align:center;">
                <div class="card-body-icon">
                  <i class="fas fa-car fa-2x"></i>
                </div>
                <div>Delivered</div>
                <div><span><?php 
                $row = mysqli_store_result($con);
                $get = mysqli_fetch_row($row);
                mysqli_free_result($row);
                if($get[0]){
                echo ''.$get[0].'';}  
                else{
                  echo '0';
                }
                 ?></span></div>
                
                
              </div>

            </div>
          </div>

        </div>

        <!-- Customer Details -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Customer Details</div>
          <div class="card-body">
            <div class="table-responsive" id="serverResponse">
             
                
              
            </div>
          </div>
        </div>

        <!-- Order Details -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Order Details</div>
          <div class="card-body">
            <div class="table-responsive">
              <?php
              $sql2 = "SELECT * FROM `order_table` where order_status IN ('ORDERED','SHIPPED')";


               $query2 = mysqli_query($con,$sql2);

        echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                echo        '<thead>';
                echo          '<tr>';
                echo           ' <th>Order ID</th>';
                echo            '<th>Customer Name</th>';
                echo           ' <th>Status</th>';
                echo       '   <th>Amount</th>   ';
                echo       '   <th>Update</th>   ';
                echo       '   </tr>';
                echo       ' </thead>';
                echo       ' <tfoot>';
                echo       '   <tr>';
                  echo           ' <th>Order ID</th>';
                echo            '<th>Customer Name</th>';
                echo           ' <th>Status</th>';
                echo       '   <th>Amount</th>   ';
                echo       '   <th>Update</th>   ';
                echo       '   </tr>';
                echo       ' </tfoot>';
                echo       '<tbody>';
              while($result2=mysqli_fetch_assoc($query2))
        { 
          echo '<form action = "update_status.php" method = "POST" >';
               $u_id = $result2['user_id']; 
               $status = $result2['order_status'];
               $o_id = $result2['order_id'];
              $sql3 = "SELECT username FROM `user_login` WHERE uid = '$u_id' ";
              $result3 = mysqli_fetch_assoc(mysqli_query($con,$sql3));
                
                echo  '<tr>';
                echo    '<td>'.$result2['order_id'].'</td>';
                echo    '<td>'.$result3['username'].'</td>';
                echo     '<td><select id="status" name="status"  >';
                echo           '<option value='.$status.'>'.$status.'</option>';
                if($status === 'ORDERED'){
                echo            '<option value="SHIPPED">SHIPPED</option>';
                // echo            '<option value="DELIVERED">DELIVERED</option>';
                 }else{
                 
                 echo            '<option value="DELIVERED">DELIVERED</option>';
                 }
                echo         '</select></td>';
                echo    '<td>'.$result2['total_bill'].'</td>';
               
                echo    '<td><input type = "submit" class="btn btn-sm btn-info" value="Update" style="background-color:#00ad7c; color:#fff"> </td>';
                echo '<input type="hidden" value='.$o_id.' name = "oid1">';
                echo  '</tr>';
                echo '</form>';
        }
              
                echo "</tbody>";
            echo "</table>";

              ?>
             
            </div>
          </div>
        </div>

        <!-- Products Details -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Products Details</div>
          <div class="card-body">
            <div class="table-responsive" id = "serverResponse1">
              <?php
                $sql = "SELECT * FROM `product_table` ";


        $query = mysqli_query($con,$sql);

        echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                echo        '<thead>';
                echo          '<tr>';
                echo           ' <th>Product Name</th>';
                echo            '<th>Supplier Name</th>';
                echo           ' <th>Quantity</th>';
                echo       '     <th>Price</th>';
                echo       '   <th>Update</th>   ';
                echo       '   </tr>';
                echo       ' </thead>';
                echo       ' <tfoot>';
                echo       '   <tr>';
                echo           ' <th>Product Name</th>';
                echo            '<th>Supplier Name</th>';
                echo           ' <th>Quantity</th>';
                echo       '     <th>Price</th>';
                echo       '<th>Update</th>';
                echo       '   </tr>';
                echo       ' </tfoot>';
                echo       '<tbody>';
                
        while($result=mysqli_fetch_assoc($query))
        { 
          echo '<form action = "update_qty.php" method = "POST">';
            $p_id = $result['pid']; 
                 
              $sql1 = "SELECT sup_name FROM `supplier` WHERE id IN (SELECT sup_id FROM `product_table` WHERE pid = '$p_id') ";
              $result1 = mysqli_fetch_assoc(mysqli_query($con,$sql1));
                
                echo  '<tr>';
                echo    '<td>'.$result['pname'].'</td>';
                echo    '<td>'.$result1['sup_name'].'</td>';
                echo     '<td><input type ="number" value='.$result['pqty'].' name="pqty"></td>';
                echo    '<td>'.$result['pprice'].'</td>';
               
                echo    '<td><input type = "submit" class="btn btn-sm btn-info" value="Update" style="background-color:#00ad7c; color:#fff"> </td>';
                echo '<input type="hidden" value='.$p_id.' name = "pid1">';
                echo  '</tr>';
                echo '</form>';
        }
              
                echo "</tbody>";
            echo "</table>";
            
              ?>
            </div>
          </div>
        </div>




      </div>
    </div>
  </div>
<script >
	const xhr = new XMLHttpRequest();
  const x = new XMLHttpRequest();
	xhr.onload = function(){
		const serverResponse = document.getElementById('serverResponse');
		serverResponse.innerHTML = this.responseText;
	};

	xhr.open("GET","userdata.php");
	xhr.send();

  // x.onload = function(){
  //   const serverResponse = document.getElementById('serverResponse1');
  //   serverResponse.innerHTML = this.responseText;
  // };

  // x.open("GET","productdata.php");
  // x.send();
</script>

</body>

</html>
