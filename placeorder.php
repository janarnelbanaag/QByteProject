<?php
  // exit();
  // header("Location: ./index.php");
  // echo "PHP WORKING";
  session_start();
  require "./includes/dbh.inc.php";
  $itemOrder = $_SESSION['itemOrder'];
  echo $itemOrder;
  $totalPrice = $_SESSION['totalPrice'];
  date_default_timezone_set("Asia/Singapore");
  $date = date('Y-m-d');
  $time = date('h:i A');
  $datetime = date('Y-m-d H:i');
  $sql = "INSERT INTO orders (username, orders, payment, currDate, currTime, orderState, compDateTime) VALUES ('".$_SESSION['username']."', '$itemOrder', $totalPrice , '$date', '$time', 'Preparing', '$datetime');";
  mysqli_query($conn, $sql);
?>