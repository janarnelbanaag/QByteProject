<?php
require_once './dbh.inc.php';
require_once './functions.inc.php';

session_start();

// For pinpointing in DB
$loggedUserEmail = $_SESSION['useremail'];

if (isset($_POST['delete-user-submit'])){
  $sql = "DELETE FROM users WHERE usersEmail = ?;";
    
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../profile.php?error=delstmtfailed");
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "s", $loggedUserEmail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    include_once "../includes/logout.inc.php";
  }
}
else{
  header("Location: ../index.php");
  exit();
}