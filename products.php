<?php
  session_start();
  require "./includes/functions.inc.php";

  if (isset($_GET['error'])){
    $errorhndlr = $_GET['error'];
    if ($errorhndlr === "no-items"){
      echo "<script>window.alert('Please add an Item to cart first!')</script>";
    }
  }

  function prodcat($cat){
    require "./includes/dbh.inc.php";
    $sql = "SELECT * FROM products WHERE proCat='$cat';";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      echo $row['proId'];
    }
  }

  function prodcard($name){
    require "./includes/dbh.inc.php";
    $sql = "SELECT proCat FROM products";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      echo $row['proCat'];
    }
  }

  // function all(){

  // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Qbyte Online Cake Shop</title>
  <link rel="stylesheet" href="./css/index.css" type="text/css" />
  <link rel="stylesheet" href="./css/variables.css" type="text/css" />
  <link rel="stylesheet" href="./css/products.css" type="text/css" />
  <link rel="stylesheet" href="./css/navbar.css" type="text/css" />
</head>
<?php
  include "./includes/header.inc.php";
?>
<div class="cart" id="cart">
  <div class="uppercart">
    <h1 class="cartheader" id="head">Your Cart</h1>
    <p><i>We're here to sweeten your day!</i></p>
  </div>

  <!-- <div class="line"></div> -->
  <div class="lowercart">
    <p id="removethis">Your orders are displayed here...</p>
    <div class="list"></div>
    <button type="submit" name="item" id="purchasebtn" class="purchasebtn" onclick="ordercatch()">Purchase</button>
  </div>
</div>
<div class="main">
  <h1 class="openning">Products We Offer...</h1>

  <!-- edit -->
  <?php
  require "./includes/dbh.inc.php";
  $sql = "SELECT DISTINCT proCat FROM products;";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    echo '<div class="product-list">
    <h1 class="product-header">'.$row["proCat"].'</h1>
    <div class="wline"></div>
    <br />

    <ul class="product-card">';
    $sql1 = "SELECT * FROM products WHERE proCat = '".$row['proCat']."';";
    $result1 = mysqli_query($conn, $sql1);  
    while($row1 = mysqli_fetch_assoc($result1)){
      echo '<li class="products">
        <div class="productnamedesc">
          <h1 class="product-name">'.$row1['proName'].'</h1>

          <h5 class="clear">P '.$row1['proPrice'].'</h5>
        </div>

        <div class="picwidth">
          <img class="product-pic" src="data:image;base64,'.base64_encode($row1["proPic"]).'" alt="product image">
          <div class="productdescorder">
            <p>'.$row1['proDesc'].'</p>
          </div>
        </div>

        <button class="order-btn" onclick="addToCart(0)">
          ADD TO CART
        </button>
      </li>
    ';
    }echo '</ul>
  </div>';
  }
  ?>
  <!-- edit end -->


</div>
<footer class="footer"></footer>
</body>
<script src="./js/products.js"></script>

</html>