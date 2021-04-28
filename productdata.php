<?php

include 'db_config.php';

$sql = "SELECT * FROM `product_table` ";


$query = mysqli_query($con,$sql);

echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
        echo        '<thead>';
        echo          '<tr>';
        echo           ' <th>Product Name</th>';
        echo            '<th>Supplier Name</th>';
        echo           ' <th>Quantity</th>';
        echo       '     <th>Price</th>';
        echo       '	 <th>Update</th>	 ';
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
        echo '<form action = "update_qty.php" method = "POST">';
while($result=mysqli_fetch_assoc($query))
{	
		$p_id = $result['pid']; 
         
  	 	$sql1 = "SELECT sup_name FROM `supplier` WHERE id IN (SELECT sup_id FROM `product_table` WHERE pid = '$p_id') ";
  	 	$result1 = mysqli_fetch_assoc(mysqli_query($con,$sql1));
        
        echo  '<tr>';
        echo    '<td>'.$result['pname'].'</td>';
        echo    '<td>'.$result1['sup_name'].'</td>';
        echo     '<td><input type ="number" value='.$result['pqty'].' id="pqty"></td>';
        echo    '<td>'.$result['pprice'].'</td>';
       
        echo    '<td><input type = "submit" class="btn-info" value="Update"> </td>';
        echo '<input type="hidden" value='.$p_id.' id = "pid1">';
        echo  '</tr>';
        
}
	    echo '</form>';
        echo "</tbody>";
		echo "</table>";
		
?>