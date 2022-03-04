<?php
require_once "../includes/dbh.inc.php";
require_once "../includes/functions.inc.php";

session_start();

// For pinpointing in DB
$loggedUserEmail = $_SESSION['useremail'];

if (isset($_POST['update-password-submit'])){
  $password = $_POST['pwd'];
  $confirmpassword = $_POST['pwd-repeat'];

  // Password Mismatch
  if (passwordMatch($password, $confirmpassword) !== false) {
    header("Location: ../profile.php?error=passwordmismatch");
    exit();
  }
  // Password is longer than 6 characters
  if (pwdLength($password) !== false) {
    header("Location: ../profile.php?error=weakpassword");
    exit();
  }

  // Updating name in DB
  $sql = "UPDATE users SET usersPwd = ? WHERE usersEmail = ?;";
            
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../profile.php?&error=updstmtfailed");
    exit();
  }
  else{
    // Hashing the new password
    $hashedNewPwd = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ss", $hashedNewPwd, $loggedUserEmail);
    mysqli_stmt_execute($stmt);

    header("Location: ../profile.php?error=none");
    mysqli_stmt_close($stmt); 
    exit();
  }
}
else{
  header("Location: ../index.php");
  exit();
}