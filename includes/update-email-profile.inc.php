<?php
require_once "../includes/dbh.inc.php";
require_once "../includes/functions.inc.php";

session_start();

// For pinpointing in DB
$loggedUserEmail = $_SESSION['useremail'];

if (isset($_POST['update-email-submit'])){
  $useremail = $_POST['email'];
  
  // ERROR HANDLING
  // Invalid Email
  if (invalidEmail($useremail) !== false) {
    header("Location: ../profile.php?error=invalidemail");
    exit();
  }
  // Email already exists
  if (emailExists($conn, $useremail) !== false) {
    header("Location: ../profile.php?error=emailexists");
    exit();
  }
  
  $_SESSION['useremail'] = $useremail;
  
  // Updating name in DB
  $sql = "UPDATE users SET usersEmail = ? WHERE usersEmail = ?;";
            
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../profile.php?&error=updstmtfailed");
    exit();
  }
  else{

    mysqli_stmt_bind_param($stmt, "ss", $useremail, $loggedUserEmail);
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