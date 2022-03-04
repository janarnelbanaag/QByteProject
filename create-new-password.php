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
  <link rel="stylesheet" href="../css/variables.css" type="text/css" />
  <link rel="stylesheet" href="../css/navbar.css" type="text/css" />
  <link rel="stylesheet" href="../css/create-new-password.css" type="text/css" />
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
  <?php
    $selector = $_GET['selector'];
    $validator = $_GET['validator']; //eto yung token na nakahash

    // checking if we have these tokens in the url
    if (empty($selector) || empty($validator)){
      echo "<script>window.alert('Could not validate your request!')</script>";
      echo "<script> window.location.href='./resetpassword.php';</script>";
    }
    else{
      // Checking if the selector is in proper hexadecimal format
      if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
        ?>
  <div class="update-password">
    <div class="update-password-btns">
      <div class="update"><span>Create New Password</span></div>
      <hr id="indicator" />
    </div>
    <div class="update-password-container">
      <form id="CreateNewPwdForm" action="../includes/reset-password.inc.php" method="post">
        <div class="update-password-form">
          <input type="hidden" name="selector" value="<?php echo $selector;?>">
          <input type="hidden" name="validator" value="<?php echo $validator;?>">
          <div class="pwd-div">
            <label for="pwd" class="pwd">Enter your new password</label>
            <input type="password" name="pwd">
          </div>
          <div class="pwd-repeat-div">
            <label for="pwd-repeat" class="pwd-repeat">Re-enter your new password</label>
            <input type="password" name="pwd-repeat">
          </div>
          <button type="submit" class="btn" name="reset-password-submit">Reset Password</button>
          <p class="error"></p>
        </div>
      </form>
    </div>
  </div>
  <?php
      }
    }
  ?>

  <?php
    // Error messages (popup)
    if (isset($_GET['error'])){
      // Empty Input
      if ($_GET['error'] === "emptyinput"){
        echo "
        <script>
          const errorEl = document.querySelector('.error');
          
          errorEl.textContent = 'Please fill out all fields!';
        </script>";
      }
      elseif ($_GET['error'] === "pwdnotsame"){
        echo "
        <script>
          const errorEl = document.querySelector('.error');
          
          errorEl.textContent = 'Please match the passwords!';
        </script>";
      }
      // Prepared Statement Failed
      elseif ($_GET['error'] === "delstmtfailed" || $_GET['error'] === "insstmtfailed" || $_GET['error'] === "selstmtfailed"  || $_GET['error'] === "updstmtfailed"|| $_GET['error'] === "emptypwdrtrow" || $_GET['error'] === "tokenmismatch" || $_GET['error'] === "emptyusersrow"){
        echo "
        <script>
          const errorEl = document.querySelector('.error');
          
          errorEl.textContent = 'Something went wrong, please try again!'
        </script>";
      }
      
      // No errors
      else if ($_GET['error'] === "none"){
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
<script src="../js/account.js"></script>

</html>