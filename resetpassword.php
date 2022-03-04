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
  <link rel="stylesheet" href="./css/resetpassword.css" type="text/css" />
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
  <div class="reset-password">
    <div class="reset-password-btns">
      <div class="reset"><span>Reset Password</span></div>
      <hr id="indicator" />
    </div>
    <!-- Login -->
    <div class="reset-password-container">
      <form id="ResetForm" action="./includes/reset-request.inc.php" method="POST">
        <p>An e-mail will be sent to you with instructions on how to reset your password.</p>
        <div class="reset-password-form">
          <div class="email-address">
            <label for="email" class="email">Enter your email address</label>
            <input type="email" name="email" />
          </div>
          <button type="submit" class="btn" name="reset-request-submit">Receive new password by email</button>
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
        echo "<script> window.location.href='./resetpassword.php';</script>";
        die();
      }
      // Invalid Email
      elseif ($_GET['error'] === "invalidemail"){
        echo "<script>window.alert('Please use a valid email!')</script>";
        echo "<script> window.location.href='./resetpassword.php';</script>";
        die();
      }
      // Prepared Statement Failed
      elseif ($_GET['error'] === "delstmtfailed" || $_GET['error'] === "insstmtfailed"){
        echo "<script>window.alert('Something went wrong, please try again!')</script>";
        echo "<script> window.location.href='./resetpassword.php';</script>";
        die();
      }
      
      // No errors
      elseif ($_GET['error'] === "none"){
        echo "<script>window.alert('Please check your email!')</script>";
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