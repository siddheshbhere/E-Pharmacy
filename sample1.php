<?php

include 'db_config.php';
$mycount = "SELECT count(*) as 'customer' FROM user_login where role= 'user';";
$mycount .=   "SELECT count(*) as 'products' FROM product_table ;";
$mycount .=  "SELECT count(*) as 'orders' FROM order_table;";
$mycount .=  " SELECT count(*) as 'Delivery' FROM order_table WHERE order_status = 'DELIVERED'" ;
mysqli_multi_query($con,$mycount);

do{
	$row = mysqli_store_result($con);
	while($get = mysqli_fetch_row($row))
	{
		if($get[0])
		{
		echo ''.$get[0].'';
	}
	}
	mysqli_free_result($row);

}while(mysqli_next_result($con));
?>





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