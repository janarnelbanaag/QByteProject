<?php
  // exit();
  // header("Location: ./index.php");
  // echo "PHP WORKING";
  require "./includes/dbh.inc.php";
  if(isset($_GET['pending'])){
    $id1 = $_GET['pending'];
    $sql = "UPDATE `orders` SET `orderState` = 'pending' WHERE `ordId` = ".$id1;
    mysqli_query($conn, $sql);
    exit();
  }elseif(isset($_GET['ready'])){
    $id2 = $_GET['ready'];
    $sql = "UPDATE `orders` SET `orderState` = 'ready' WHERE `ordId` = ".$id2;
    mysqli_query($conn, $sql);
    exit();
  }elseif(isset($_GET['purchased'])){
    $id3 = $_GET['purchased'];
    $sql = "UPDATE `orders` SET `orderState` = 'purchased' WHERE `ordId` = ".$id3;
    mysqli_query($conn, $sql);
    exit();
  }elseif(isset($_GET['terminate'])){
    $id4 = $_GET['terminate'];
    $sql = "UPDATE `orders` SET `orderState` = 'terminate' WHERE `ordId` = ".$id4;
    mysqli_query($conn, $sql);
    exit();
  }
  
?>