<?php
  session_start();
  // require "./includes/functions.inc.php";
  $try = print_r($_GET['item'], true);
  // echo $try;
  $_SESSION['itemOrder'] = $try;
  echo $_SESSION['itemOrder'];
  $arr1 = explode(",",$_GET['item']);
  print_r($arr1);
  $arr = array("Name", "Ito Yung Name");
  print_r($arr);
  // $pricetemp = 21;
  $pricetemp = 21;

  $totalPrice = 0;
  $payment = 20;  
  // $payment = 20; 
  // edit
  function pay($name){
    require "./includes/dbh.inc.php";
    $sql = "SELECT * FROM products;";
    // WHERE proName='$name';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
      $totalPrice = 0;
      while($row = mysqli_fetch_assoc($result)){
      echo "gumagana <br>";
      echo $row['proPrice'];
      echo $totalPrice+=$row['proPrice'];
      }
      return $totalPrice;
    } else {
      echo "baka di mo pa nalalagay haha";
      print_r($row);
    }
  }
  // edit end
  // function ordertodb($try, $totalPrice){
  //   require "./includes/dbh.inc.php";
  //   date_default_timezone_set("Asia/Singapore");
  //   $date = date('Y-m-d');
  //   $time = date('h:i A');
  //   $datetime = date('Y-m-d H:i');
  //   $sql = "INSERT INTO orders (username, orders, payment, currDate, currTime, orderState, compDateTime) VALUES ('".$_SESSION['username']."', '$try', $totalPrice , '$date', '$time', 'Preparing', '$datetime');";
  //   mysqli_query($conn, $sql);
  // }

  function namedb($name){
    require "./includes/dbh.inc.php";
    $sql = "SELECT * FROM products WHERE proName='$name'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      return $row['proPrice'];
    }
  }

function pricedb($name){
  require "./includes/dbh.inc.php";
  $sql = "SELECT * FROM products WHERE proName='$name'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    return $row['proPrice'];
  }
}

foreach($arr as $loopdata){
  echo $loopdata;
  namedb($loopdata);
  $totalPrice+=namedb($loopdata);
  echo $totalPrice;
  echo "gumana";
  // pay("Ito Yung Name");
}
//final output
echo "ITO YUNG TOTAL PRICE";
echo $totalPrice;
$_SESSION['totalPrice'] = $totalPrice;
// pay('asd');
// ordertodb($try, $totalPrice); //AJAX
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
  <link rel="stylesheet" href="./css/navbar.css" type="text/css" />
  <link rel="stylesheet" href="./css/checkout.css" />
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
  // jquery code
  $(document).ready(function() {
    $("#checkout-btn").click(function() {
      $.ajax({
        url: "placeorder.php",
        success: function(result) {
          $(".right-content").html(result);
        }
      });
      // $.ajax(
      //   // type: "POST",
      //   "placeorder.php",
      //   function() {
      //     alert('ok');
      //   }
      // );
    })
  })
  </script>
</head>
<?php 
    include "./includes/header.inc.php";
  ?>

<div class="main">
  <div class="checkout-content">
    <div class="left-content" id="left-content">
      <div class="topleft-content">
        <div class="arrow" id="arrow">
          <a href="./products.php">
            <img src="./img/icons/back-icon.svg" alt="basta kunyare arrow" />
          </a>
        </div>

        <h1 class="checkout-word">Checkout</h1>
      </div>
      <div class="lowerleft-content" id="lowerleft-content">
        <div class="left" id="left">
          <?php 
                foreach($arr as $loopdata){
                    // require "./includes/dbh.order.inc.php"                  
                    echo "<div class='product-box'>";
                    echo "<div class='proName'>".$loopdata."</div>";
                    echo "<div class='proPrice'>".pricedb($loopdata)."</div>";
                    echo "</div>";
                  }
                ?>
        </div>

      </div>
      <div class="right">

      </div>
    </div>

    <div class="right-content" id="right-content">
      <div class="topright-content">
        <h1 class="fontsize">Order Summary</h1>
        <div class="wline"></div>
        <div class="orders">

          <?php 
                  foreach($arr as $loopdata){
                    // require "./includes/dbh.order.inc.php"
                    echo "<div class='ordersum'>";
                    echo "<div class='prodname'>".($loopdata)."</div";
                    echo "><div class='prodprice'>".pricedb($loopdata)."</div></div>";
                  }
                  
                ?>

        </div>
      </div>
      <div class="lowerright-content">
        <form action="" method="POST" class="form">
          <div class="inputfield">
            <label for="deliverydate"><strong>Deliver Time</strong></label><br />
            <select name="deliverydate" id="deliverydate">
              <option value="today">Today</option>
              <!-- <option value="Tomorrow">Tomorrow</option> -->
            </select>
            <select name="time" id="time">
              <option value="15 minutes">15 Mins</option>
              <option value="30 minutes">30 Mins</option>
              <option value="45 minutes">45 Mins</option>
              <option value="1 hour">1 Hour</option>
              <option value="2 hours">2 Hour</option>
            </select>
            <br />
            <label for="address" id="target"><strong>Pickup at</strong></label><br />
            <input type="text" name="address" id="address" value="127 A. Luna St. Brgy. Malinao, Pasig, Philippines"
              readonly />

            <br />
            <label for="payment"><strong>Payment</strong></label><br />
            <input type="text" name="payment" id="payment" value="Cash on Pickup" readonly />
          </div>
        </form>
        <button type="button" class="checkout-btn" id="checkout-btn" name="checkout-btn">PLACE
          ORDER</button>

      </div>
    </div>
  </div>
</div>
</div>
<footer class="footer"></footer>
</body>
<script src="./js/checkout.js"></script>

</html>