<?php

// For signup

function emptyInputSignup($name, $email, $cnumber, $password, $confirmpassword) {
  $result = "";
  if (empty($name) || empty($email) || empty($cnumber) || empty($password) || empty($confirmpassword)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}
function invalidName($name) {
  $result = "";
  if (!preg_match("/^[a-zA-Z]*$/", $name)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}
function invalidEmail($email) {
  $result = "";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}
function passwordMatch($password, $confirmpassword) {
  $result = "";
  if ($password !== $confirmpassword) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}
function adminExists($conn, $name) {
  $sql = "SELECT * FROM users WHERE usersName = ?;";
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../account.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  // Grabbing the data
  $resultData = mysqli_stmt_get_result($stmt);

  // Checking if we get data result from database
  if ($row = mysqli_fetch_assoc($resultData)){
    // this has a second purpose for login
    return in_array("admin", $row) || in_array("Admin", $row); //returning all data if the user already exists (if data is returned it is considered as true)
  }
  else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function emailExists($conn, $email) {
  $sql = "SELECT * FROM users WHERE usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../account.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  // Grabbing the data
  $resultData = mysqli_stmt_get_result($stmt);

  // Checking if we get data result from database
  if ($row = mysqli_fetch_assoc($resultData)){
    // this has a second purpose for login
    return $row; //returning all data if the user already exists (if data is returned it is considered as true)
  }
  else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}
function cnumberExists($conn, $cnumber) {
  $sql = "SELECT * FROM users WHERE usersContact = ?;";
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../account.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $cnumber);
  mysqli_stmt_execute($stmt);

  // Grabbing the data
  $resultData = mysqli_stmt_get_result($stmt);

  // Checking if we get data result from database
  if ($row = mysqli_fetch_assoc($resultData)){
    // this has a second purpose for login
    return $row; //returning all data if the user already exists
  }
  else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function pwdLength($password) {
  $result = "";
  if ((string)(strlen($password)) <= 6) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function createUser($conn, $name, $email, $cnumber, $password) {
  $sql = "INSERT INTO users (usersName, usersEmail, usersContact, usersPwd) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  // Checking if the prepared statement fails
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../account.php?error=stmtfailed");
    exit();
  }

  // Hashing password
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $cnumber, $hashedPwd);
  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);

  header("Location: ../account.php?error=none");
  exit();
}

// For Login

function emptyInputLogin($email, $password) {
  $result = "";
  if (empty($email) || empty($password)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function loginUser($conn, $email, $password){
  $emailExists = emailExists($conn, $email);

  // Checking if emailExists return as false
  if ($emailExists === false){
    header("Location: ../account.php?error=invalidlogin");
    exit();
  }

  // Checking if the entered password matches the hashed password in the database (using associative array)
  $hashedPwd = $emailExists['usersPwd'];
  $checkPwd = password_verify($password, $hashedPwd);

  if ($checkPwd === false){
    header("Location: ../account.php?error=invalidpwd");
    exit();
  }

  else if ($checkPwd === true){
    // Login the user to the website (using sessions)
    session_start();
    $_SESSION['userid'] = $emailExists['usersId'];
    $_SESSION['username'] = $emailExists['usersName'];
    $_SESSION['useremail'] = $emailExists['usersEmail'];
    $_SESSION['usercontact'] = $emailExists['usersContact'];
    if (ucfirst($_SESSION['username']) === "Admin") {
      //accepting admin or Admin
      header("Location: ../admin/admin.index.php");
      exit();
    }
    header("Location: ../index.php");
    exit();
  }
}

// For Reset Page

function emptyInputReset($email) {
  $result = "";
  if (empty($email)) {
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

// For Product page
// function namedb($id){
//   require "./includes/dbh.inc.php";
//   $sql = "SELECT * FROM products WHERE proId='$id'";
//   $result = mysqli_query($conn, $sql);
//   while($row = mysqli_fetch_assoc($result)){
//     echo $row['proName'];
//   }
// }


function namedb($id){
  require "../includes/dbh.inc.php";
  $sql = "SELECT * FROM products WHERE proId='$id'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    echo $row['proName'];
  }
}

// Working output through elements in db
function descdb($category){
  require "../includes/dbh.inc.php";
  // $sql = "SELECT proDesc FROM products WHERE proCat =".$category.";";
  $sql = "SELECT proDesc FROM products WHERE proCat ='" . $category . "';";
  $result = mysqli_query($conn, $sql);
  // print_r($result['num_rows']);
  // print_r($row = mysqli_fetch_assoc($result));
  while($row = mysqli_fetch_assoc($result)){
    // echo $row['proDesc'];
    print_r($row['proDesc']);
  }
}

function pricedb($category){
  require "../includes/dbh.inc.php";
  $sql = "SELECT proPrice FROM products WHERE proCat ='" . $category . "';";
  $result = mysqli_query($conn, $sql);
  // print_r($result['num_rows']);
  // print_r($row = mysqli_fetch_assoc($result));
  while($row = mysqli_fetch_assoc($result)){
    // echo $row['proDesc'];
    print_r($row['proPrice']);
  }
}

// function pricedb($id){
//   require "../includes/dbh.inc.php";
//   $sql = "SELECT * FROM products WHERE proId='$id'";
//   $result = mysqli_query($conn, $sql);
//   while($row = mysqli_fetch_assoc($result)){
//     echo $row['proPrice'];
//   }
// }

function imgdb($id){
  require "../includes/dbh.inc.php";
  $sql = "SELECT * FROM products WHERE proId='$id'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    echo '<img src="data:image;base64,'.base64_encode($row['proPic']).'" alt="product image">';
  }
}

// For Order Page
function orderdb($name){
  require "../includes/dbh.inc.php";
  // $sql = "SELECT * FROM products WHERE proName='$name'";
  $sql = "SELECT * FROM products WHERE proName='$name'";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
    return "gumagana <br>";
    }
  } else {
    return "gumagana pero wala pa sa db";
  }
  
}

// For Order Admin Page
// function orderdb($name){
//   require "../includes/dbh.inc.php";
//   $sql = "SELECT * FROM products";
//   $result = mysqli_query($conn, $sql);
//   $resultCheck = mysqli_num_rows($result);
//   if($resultCheck > 0){
//     while($row = mysqli_fetch_assoc($result)){
//     return "gumagana <br>";
//     }
//   } else {
//     return "gumagana pero wala pa sa db";
//   }
  
// }