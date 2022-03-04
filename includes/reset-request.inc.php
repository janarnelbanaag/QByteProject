<?php

// Checking if the user has clicked submit button
if (isset($_POST['reset-request-submit'])) {
  
  require './functions.inc.php';
  require './dbh.inc.php';

  $userEmail = $_POST['email'];
  
  // ERROR HANDLING
  // Empty Input
  if (emptyInputReset($userEmail) !== false) {
    header("Location: ../resetpassword.php?error=emptyinput");
    exit();
  }
  // Invalid Email
  if (invalidEmail($userEmail) !== false) {
    header("Location: ../resetpassword.php?error=invalidemail");
    exit();
  }
  
  // Creating tokens: (2 tokens for safety)
  // 1. token used to look inside the database to pinpoint the token that we need to check the user with when they get back to our website
  $selector = bin2hex(random_bytes(8));

  // 2. authenticate the correct user after clicking on the link provided by email
  $token = random_bytes(32);

  // link that will be sent to the user by email
  $url = "http://localhost/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); //local
  // $url = "url/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); //online

  $expires = date("U") + 1800; //Today's date in seconds since 1970, 1800 - half hr in sec

  // Delete any existing entries of a token inside the database (to make sure there's no existing token from the same user inside the database)
  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../resetpassword.php?error=delstmtfailed");
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  // INSERTING THE TOKEN TO THE DATABASE
  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../resetpassword.php?error=insstmtfailed");
    exit();
  }
  else{
    // Hashing token
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  
  header("Location: ../resetpassword.php?error=none");
  require './phpmailer.inc.php';
  exit();
}
else{
  header("Location: ../index.php");
  exit();
}