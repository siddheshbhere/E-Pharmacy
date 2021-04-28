<?php

session_start();
if (!isset($_SESSION['email']))
{

	header('Location:regilog.php');
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Pharmacopoeia</title>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/forgot.css">
  <link rel="icon" href="favicon.ico">

  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<body>

  <div class="container padding-bottom-3x mb-2 mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-8 col-md-10">

	            <form class="card mt-4" action="reset_password.php" method="POST" onsubmit="return validate();">
	                <div class="card-body">
                      <div id="error_message" style="background-color:white; color:red; margin-bottom:20px;"></div>
	                    <div class="form-group"> <label for="email-for-pass">Enter New Password</label> <input class="form-control" type="password" placeholder="Password" id="password" name="password"></div>
                       <div class="form-group"> <label for="email-for-pass">Confirm Password</label> <input class="form-control" type="password" placeholder="Confirm Password" id="cpassword"> </div>
	                </div>
	                <div class="card-footer"> <input class="btn btn-lg submit" style="background-color:#00ad7c; color:#fff" type="submit" value="Submit" name="submit" id="rsubmit"/> </div>
	            </form>
	        </div>
	    </div>
	</div>
</body>
<script  src="js/new_pass.js"></script>

</html>
