<?php

if(isset($_POST['reset-password-submit'])){
  // Getting the data from the inputs
  $selector = $_POST['selector'];
  $validator = $_POST['validator'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if (empty($password) || empty($passwordRepeat)){
    header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=emptyinput");
    exit();
  }
  else if ($password !== $passwordRepeat){
    header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=pwdnotsame");
    exit();
  }

  // Checking for the tokens and expires
  $currentDate = date("U");

  require_once "../includes/dbh.inc.php";

  $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?;";

  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=selstmtfailed");
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
    mysqli_stmt_execute($stmt);
  
    // Grabbing the data
    $resultData = mysqli_stmt_get_result($stmt);
  
    // Checking if we get data result from database
    if (!$row = mysqli_fetch_assoc($resultData)){
      echo "<script>window.alert('You need to resubmit your reset request!')</script>";
      echo "<script> window.location.href='../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=emptypwdrtrow';</script>";
    }
    else{
      // Match the token (validator) with the token that we sent from the form (yung nasa link tas napunta sa input field)
      // We also need to make sure that these tokens are in binary data
      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
  
      if ($tokenCheck === false){
        echo "<script>window.alert('You need to resubmit your reset request!')</script>";
        echo "<script> window.location.href='../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=tokenmismatch';</script>";
      }
      elseif ($tokenCheck === true) {
        // Grabbing the email of the user
        $tokenEmail = $row['pwdResetEmail'];
  
        $sql = "SELECT * FROM users WHERE usersEmail = ?;";
  
        $stmt = mysqli_stmt_init($conn);
  
        // Checking if the prepared statement fails
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=selstmtfailed");
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);

          $resultData = mysqli_stmt_get_result($stmt);
  
          // Checking if we get data result from database
          if (!$row = mysqli_fetch_assoc($resultData)){
            echo "<script>window.alert('You need to resubmit your reset request!')</script>";
            echo "<script> window.location.href='../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=emptyusersrow';</script>";
          }
          else{
            // print_r($row['usersContact']);
            // Updating the password from inside the users table
            $sql = "UPDATE users SET usersPwd = ? WHERE usersEmail = ?;";
            
            $stmt = mysqli_stmt_init($conn);
  
            // Checking if the prepared statement fails
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=updstmtfailed");
              exit();
            }
            else{
              // Hashing the new password
              $hashedNewPwd = password_hash($password, PASSWORD_DEFAULT);

              mysqli_stmt_bind_param($stmt, "ss", $hashedNewPwd, $tokenEmail);
              mysqli_stmt_execute($stmt);

              // Deleting the existing token from the pwdReset db
              $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
            
              $stmt = mysqli_stmt_init($conn);
    
              // Checking if the prepared statement fails
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=delstmtfailed");
                exit();
              }
              else{
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location: ../account.php?error=noneandpwdupdated");
                mysqli_stmt_close($stmt); 
                exit();
              }

            }
          }
        }
      }
    }
  
    mysqli_stmt_close($stmt);
  }
}
else{
  header("Location: ../index.php");
  exit();
}