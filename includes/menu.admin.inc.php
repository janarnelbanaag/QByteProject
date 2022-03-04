<?php

require_once "../includes/dbh.inc.php";

$dbh = new PDO("mysql:host=localhost;dbname=qbproject", "root", "");

if (isset($_POST['add-menu-submit'])){
  $file = $_FILES['add-item-img'];

  // Input Values
  $itemDesc = $_POST['add-item-desc'];
  $itemName = $_POST['add-item-name'];
  $itemPrice = $_POST['add-item-price'];
  $itemCat = $_POST['add-category-price'];

  $fileName = $_FILES['add-item-img']['name'];
  $fileTmpName = $_FILES['add-item-img']['tmp_name'];
  $fileSize = $_FILES['add-item-img']['size'];
  $fileError = $_FILES['add-item-img']['error'];
  $fileType = $_FILES['add-item-img']['type'];



  // Allowing only jpeg, png's the website
  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowedExt = array('jpg', 'jpeg', 
  'png');

  // Checking if the file is alowed to get uploaded inside the website
  if (in_array($fileActualExt, $allowedExt)){
    // Checking for uploading errors
    if($fileError === 0){
      // if ($fileSize < 5000000){}
      $fileNameNew = uniqid('', true).".".$fileActualExt;

      $fileData = file_get_contents($fileTmpName);
      $stmt = $dbh->prepare("INSERT INTO products VALUES('', ?, ?, ?, ?, ?);");
      $stmt->bindParam(1, $itemCat);
      $stmt->bindParam(2, $itemName);
      $stmt->bindParam(3, $itemDesc);
      $stmt->bindParam(4, $itemPrice);
      $stmt->bindParam(5, $fileData);
      $stmt->execute();

      header("Location: ../admin/menu.admin.php?error=none");
      exit();
    }
    else{
      // There was an error uploading your file! ERROR HANDLING
    }
  }
  else{
    // You cannot upload files of this type! - ERROR HANDLING
  }
}
else{
  header("Location: ../admin/menu.admin.php");
  exit();
}