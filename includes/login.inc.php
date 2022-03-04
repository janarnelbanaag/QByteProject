<?php

// checking if the user had clicked the submit button
if (isset($_POST['submit'])){
  
  $email = $_POST['email'];
  $password = $_POST['password'];

  require_once './dbh.inc.php';
  require_once './functions.inc.php';

  // Empty Input
  if (emptyInputLogin($email, $password) !== false) {
    header("Location: ../account.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $email, $password);

}
else{
  header("Location: ../index.php");
  exit();
}