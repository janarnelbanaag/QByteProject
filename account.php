<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/variables.css" type="text/css" />
  <link rel="stylesheet" href="./css/navbar.css" type="text/css" />
  <link rel="stylesheet" href="./css/account.css" type="text/css" />
</head>
<?php
  include "./includes/header.inc.php";
?>
<div class="bg-img">
  <div class="hero-header">
    <h1>Hero Header</h1>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Consectetur, magni debitis ut commodi officia porro recusandae
      accusamus eius nihil atque.
    </p>
  </div>
  <div class="login-signup">
    <div class="login-signup-btns">
      <div class="login"><span>Login</span></div>
      <div class="signup"><span>Sign-Up</span></div>

      <hr id="indicator" />
    </div>
    <!-- Login -->
    <div class="login-signup-container">
      <form id="LoginForm" action="./includes/login.inc.php" method="POST">
        <div class="login-form">
          <div class="email-address">
            <label for="email" class="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter your Email Address" />
          </div>
          <div class="password">
            <label for="password" class="password">Password</label>
            <input type="password" name="password" placeholder="Enter your Password" />
          </div>
          <button type="submit" class="btn" name="submit">Login</button>
          <p><a href="./resetpassword.php">Forgot your password?</a></p>
        </div>
      </form>
      <!-- Signup -->
      <form id="RegForm" action="./includes/signup.inc.php" method="POST">
        <div class="signup-form">
          <div class="display-name">
            <label for="name" class="name">Name</label>
            <input type="name" name="name" id="name" placeholder="Enter your Name" />
          </div>
          <div class="email-address">
            <label for="email" class="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter Your Valid Email Address" />
          </div>
          <div class="contact-number">
            <label for="cnumber" class="cnumber">Contact Number</label>
            <input type="cnumber" name="cnumber" id="cnumber" placeholder="Enter your Contact Number" />
          </div>
          <div class="password-div">
            <label for="password" class="password">Password</label>
            <input type="password" name="password" placeholder="Must contain seven or more characters" />
          </div>
          <div class="confirm-password-div">
            <label for="confirm-password" class="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Re-enter your Password" />
          </div>
          <button type="submit" class="btn" name="submit">Sign-Up</button>
          <br />
        </div>
      </form>
    </div>
  </div>
  <?php
    // Error messages (popup)
    if (isset($_GET['error'])){
      // Empty Input
      if ($_GET['error'] === "emptyinput"){
        echo "<script>window.alert('Please fill out all fields!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Improper Name
      else if ($_GET['error'] === "invalidname"){
        echo "<script>window.alert('Please type a proper name!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Invalid Email
      else if ($_GET['error'] === "invalidemail"){
        echo "<script>window.alert('Please use a valid email!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Password Mismatch
      else if ($_GET['error'] === "passwordmismatch"){
        echo "<script>window.alert('Your passwords don't match!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Email already exists
      else if ($_GET['error'] === "emailexists"){
        echo "<script>window.alert('Your email already exists!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Contact Number already exists
      else if ($_GET['error'] === "cnumberexists"){
        echo "<script>window.alert('Your contact number already exists!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Contact Number already exists
      else if ($_GET['error'] === "adminexists"){
        echo "<script>window.alert('You are not the admin!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Password is longer than 6 characters
      else if ($_GET['error'] === "weakpassword"){
        echo "<script>window.alert('Your password must be more than 6 characters!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      // Prepared Statement Failed
      else if ($_GET['error'] === "stmtfailed"){
        echo "<script>window.alert('Something went wrong, please try again!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }

      // For login
      // Checking if emailExists return as false
      else if ($_GET['error'] === "invalidlogin"){
        echo "<script>window.alert('Please enter a valid email!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      else if ($_GET['error'] === "invalidpwd"){
        echo "<script>window.alert('Incorrect password, please try again!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      
      // For reset
      else if ($_GET['error'] === "noneandpwdupdated"){
        echo "<script>window.alert('You have successfully updated your password!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }
      
      
      // No errors
      else if ($_GET['error'] === "none"){
        echo "<script>window.alert('You have successfully signed up!')</script>";
        echo "<script> window.location.href='./account.php';</script>";
        die();
      }

      

    }
  ?>

</div>
</div>
<footer class="footer"></footer>
</div>
</body>
<script src="./js/account.js"></script>

</html>