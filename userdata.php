<?php
include 'db_config.php';
$sql = "SELECT * FROM `user_login` WHERE role='user'";
$query = mysqli_query($con,$sql);

echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
        echo        '<thead>';
        echo          '<tr>';
        echo           ' <th>Customer Id</th>';
        echo            '<th>Customer Name</th>';
        echo           ' <th>Contact Number</th>';
        echo       '     <th>Mail-ID</th>';
        echo       '   </tr>';
        echo       ' </thead>';
        echo       ' <tfoot>';
        echo       '   <tr>';
        echo       '     <th>Customer Id</th>';
        echo       '     <th>Customer Name</th>';
        echo       '     <th>Contact Number</th>';
        echo       '     <th>Mail-ID</th>';
        echo       '   </tr>';
        echo       ' </tfoot>';
        echo       '<tbody>';
while($result=mysqli_fetch_assoc($query))
{
         
  	 
        echo  '<tr>';
        echo    '<td>'.$result['uid'].'</td>';
        echo    '<td>'.$result['username'].'</td>';
        echo     '<td>'.$result['mob'].'</td>';
        echo    '<td>'.$result['email'].'</td>';
        echo  '</tr>';
}
        echo "</tbody>";
		echo "</table>";
?>