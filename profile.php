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
  <link rel="stylesheet" href="./css/profile.css" type="text/css" />
</head>
<?php
  include "./includes/header.inc.php";
?>
<div class="bg-img">
  <div class="account-content">
    <div class="upper-content">
      <div class="back-button">
        <img src="./img/icons/back-icon.svg" alt="back-icon" />
      </div>
      <h1>Hero Header</h1>
      <div class="user-icon">
        <img src="./img/icons/user-icon.svg" alt="user-icon" />
      </div>
    </div>
    <div class="main-content">
      <div class="display-name">
        <div class="displaycontent">
          <form action="./includes/update-name-profile.inc.php" method="post">
            <div class="textdisplay">
              <label id="displaylabel">DISPLAY NAME</label>

              <?php
                if (isset($_SESSION['useremail'])){
                  // echo '<span id="display">'.$_SESSION['username'].'</span>';
                  echo '<input type="text" name="name" id="display" class="input-name" value="' . $_SESSION['username'] . '" readonly>';
                }
                else{
                  echo '<span id="display">Name</span>';
                }
              ?>

            </div>
            <div class="modify-btns">
              <button id="edit-name" class="edit-btn" type="button">EDIT</button>
              <button id="save-name" class="edit-btn" name="update-name-submit">SAVE</button>
            </div>
          </form>
        </div>
      </div>
      <div class="display-name">
        <div class="displaycontent">
          <form action="./includes/update-contact-profile.inc.php" method="post">
            <div class="textdisplay">
              <label id="displaylabel">CONTACT NUMBER</label>
              <?php
              if (isset($_SESSION['useremail'])){
                echo '<input type="text" name="cnumber" id="display" class="input-cnumber" value="' . $_SESSION['usercontact'] . '" readonly>';
              }
              else{
                echo '<span id="display">Contact Number</span>';
              }
            ?>
            </div>
            <div class="modify-btns">
              <button id="edit-cnumber" class="edit-btn" type="button">EDIT</button>
              <button id="save-cnumber" class="edit-btn" name="update-cnumber-submit">SAVE</button>
            </div>
          </form>
        </div>
      </div>
      <div class="display-name">
        <div class="displaycontent">
          <form action="./includes/update-email-profile.inc.php" method="post">
            <div class="textdisplay">
              <label id="displaylabel">EMAIL ADDRESS</label>
              <?php
              if (isset($_SESSION['useremail'])){
                echo '<input type="text" name="email" id="display" class="input-email" value="' .$_SESSION['useremail'] . '" readonly>';
              }
              else{
                echo '<span id="display">Email Address</span>';
              }
            ?>
            </div>
            <div class="modify-btns">
              <button id="edit-email" class="edit-btn" type="button">EDIT</button>
              <button id="save-email" class="edit-btn" name="update-email-submit">SAVE</button>
            </div>
          </form>
        </div>
      </div>
      <div class="display-name">
        <div class="displaycontent">
          <form action="./includes/update-password-profile.inc.php" method="post">
            <div class="textdisplay">
              <?php
              if (isset($_SESSION['useremail'])){
                echo '<input type="password" name="pwd" id="display" class="input-password" placeholder="Password" readonly>';
                echo '<input type="password" name="pwd-repeat" id="display" class="input-password-repeat" placeholder="Re-type your password" readonly>';
              }
              else{
                echo '<span id="display">Email Address</span>';
              }
            ?>
            </div>

            <div class="modify-btns">
              <button id="edit-password" type="button" class="edit-btn">EDIT</button>
              <button id="save-password" class="edit-btn" name="update-password-submit">SAVE</button>
            </div>
          </form>
        </div>
      </div>
      <form action="./includes/delete-user.inc.php" method="POST">
        <div class="bottombutton">
          <button id="delete-btn" class="edit-btn" name="delete-user-submit">Delete Account</button>
        </div>
      </form>
    </div>
  </div>

  <?php
    // Error messages (popup)
    if (isset($_GET['error'])){
      // Empty Input
      // Prepared Statement Failed
      if ($_GET['error'] === "delstmtfailed" || $_GET['error'] === "insstmtfailed" || $_GET['error'] === "selstmtfailed"  || $_GET['error'] === "updstmtfailed"|| $_GET['error'] === "emptypwdrtrow" || $_GET['error'] === "tokenmismatch" || $_GET['error'] === "emptyusersrow"){
        echo "<script>window.alert('Something went wrong, please try again!')</script>";
        echo "<script> window.location.href='./profile.php';</script>";
        die();
      }
      // Invalid Email
      else if ($_GET['error'] === "invalidemail"){
        echo "<script>window.alert('Please use a valid email!')</script>";
        echo "<script> window.location.href='./profile.php';</script>";
        die();
      }
      // Email already exists
      else if ($_GET['error'] === "emailexists"){
        echo "<script>window.alert('Your email already exists!')</script>";
        echo "<script> window.location.href='./profile.php';</script>";
        die();
      }
      // Contact Number already exists
      else if ($_GET['error'] === "cnumberexists"){
        echo "<script>window.alert('Your contact number already exists!')</script>";
        echo "<script> window.location.href='./profile.php';</script>";
        die();
      }
      
      // No errors
      else if ($_GET['error'] === "none"){
        echo "<script>window.alert('Your credentials have been updated!')</script>";
        echo "<script> window.location.href='./profile.php';</script>";
        die();
      }
    }
  ?>
</div>
</div>
</div>
<footer class="footer"></footer>
</body>
<script src="./js/profile.js"></script>

</html>