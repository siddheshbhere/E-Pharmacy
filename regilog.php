<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Pharmacopoeia</title>
  <link rel="stylesheet" href="css/regilog.css">

</head>
<body >

    <div class="main">
      <div class="container a-container" id="a-container">
        <div id="error_message" style="background-color:white; color:red; margin-bottom:20px;"></div>
        <?php

        $errors = array(
                                    1=>"Invalid user name , Try again",
                                    2=>"Please login as admin to access this area",
                                    3=>"Please login as user to access this area",
                                    4=>"Invalid password , Try again",
                                    5=>"Username already exists",
                                    6=>"Email already exists",
                                    7=>"User Registered successfully",
                                  );

         $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
        if ($error_id == 5) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 6) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 7) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                ?>  
        <form class="form" id="a-form" method="POST" action="create.php"  onsubmit="return validate();">
          <h2 class="form_title title">Create Account</h2>
          <input class="form__input" type="text" placeholder="Username" id="name" name='name'>
          <input class="form__input" type="email" placeholder="Email" id="email" name='email'>
          <input class="form__input" type="nymber"  placeholder="Enter Your Contact number" id="phone" name='phone'>
          <input class="form__input" type="password" placeholder="Password" id="password" name='password'>
          <input class="form__input" type="password" placeholder="Confirm Password" id="cpassword" name='cpassword'>
          <input class="form__button button submit" type="submit" value="SIGN UP" name="submit" id="rsubmit"/>
        </form>
      </div>
      <div class="container b-container" id="b-container">
          <?php       
                    

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 2) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 3) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }elseif ($error_id == 4) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
                               ?>  
        <div id="error_messagel" style="background-color:white; color:red; margin-bottom:20px;"></div>
        <form class="form" id="b-form" method="POST" action="login.php" onsubmit="return validatel();">
          <h2 class="form_title title">Sign in to Website</h2>
          <input class="form__input" type="text" placeholder="Username" id="namel" name='username1'>
          <input class="form__input" type="password" placeholder="Password"  id="passwordl" name='password1'><a class="form__link" href="forgot.php" style="text-decoration: none">Forgot your password?</a>
          <input class="form__button button submit" type="submit" value="SIGN IN" name="lsubmit" id="lsubmit"/>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Welcome Back !</h2>
          <p class="switch__description description">To keep connected with us please login with your personal info</p>
          <button class="switch__button button switch-btn">SIGN IN</button>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">Hello Friend !</h2>
          <p class="switch__description description">Enter your personal details and start journey with us</p>
          <button class="switch__button button switch-btn">SIGN UP</button>
        </div>
      </div>
    </div>

  <script  src="js/regilog.js"></script>

</body>
</html>
