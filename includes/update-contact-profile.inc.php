<?php
require_once "../includes/dbh.inc.php";
require_once "../includes/functions.inc.php";

session_start();

// For pinpointing in DB
$loggedUserEmail = $_SESSION['useremail'];

if (isset($_POST['update-cnumber-submit'])){
  $usercontact = $_POST['cnumber'];

  // Contact Number Already Exists
  if (cnumberExists($conn, $usercontact) !== false) {
    header("Location: ../account.php?error=cnumberexists");
    exit();
  }

  $_SESSION['usercontact'] = $usercontact;

  // Updating name in DB
  $sql = "UPDATE users SET usersContact = ? WHERE usersEmail = ?;";
            
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../profile.php?&error=updstmtfailed");
    exit();
  }
  else{

    mysqli_stmt_bind_param($stmt, "ss", $usercontact, $loggedUserEmail);
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