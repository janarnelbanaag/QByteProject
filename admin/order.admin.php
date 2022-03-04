<!-- edit -->
<?php
  function orderdb(){
  require "../includes/dbh.inc.php";
  $sql = "SELECT * FROM products";
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

// function terminate($ordId){
//   require "../includes/dbh.inc.php";
//   $sql = "SELECT * FROM orders";
//   $result = mysqli_query($conn, $sql);
//   $row = mysqli_fetch_assoc($result);
//   if(!isset($_POST['terminate'])){
//   $sql1 = "UPDATE orders SET orderState = 'terminate' WHERE orders.ordId = 24" ;
//   $result1 = mysqli_query($conn, $sql1);
//   echo "success";
//   }
// }


?>
<!-- edit -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Qbyte Online Cake Shop</title>
  <link rel="stylesheet" href="../css/variables.css" type="text/css" />
  <link rel="stylesheet" href="../css/navbar.css" type="text/css" />
  <link rel="stylesheet" href="../css/index.css" type="text/css" />
  <link rel="stylesheet" href="../css/order.admin.css" type="text/css" />
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
  </script>

  <!-- <script>
  // jquery code
  // $(document).ready(function() {
  //   $("#statusBtns").submit(function() {
  //     // Print the value of the button that was clicked
  //     var x = $(document.activeElement).attr('id').val()
  //     console.log("hello");
  //   });
  // });
  </script> -->
</head>
<?php
  include "../includes/header-admin.inc.php"
?>
<div class="bg-img">
  <div class="main-admin">
    <div class="daily-report">
      <table>
        <tr>
          <th>Date</th>
          <th>Earnings</th>
        </tr>
        <?php
          require "../includes/dbh.inc.php";
          $z = [];
          $x = [];
          $y = [];
          $sql = "SELECT * FROM orders";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          $row= mysqli_fetch_assoc($result);
          // print_r($row);
          foreach($result as $loopdata){
            // echo $loopdata['payment']." ";
            if(!in_array($loopdata['currDate'], $z)){
              array_push($z, $loopdata['currDate']);
              array_push($x, $loopdata['payment']);
              // echo "<tr>
              // <td>".$loopdata['currDate']."</td>
              // <td>".$loopdata['payment']."</td>
              // </tr>";
            }else{
              $x[array_search($loopdata['currDate'], $z, true)]+=$loopdata['payment'];
            }
          }
          // print_r($z);
          // print_r($x);
          for ($i=0;$i<count($x);$i++){
            // array_push($y, $z[$i]);
            // array_push($y, $x[$i]);
            echo "<tr>
              <td id='date'>".$z[$i]."</td>
              <td id='earnings'>".$x[$i]."</td>
              </tr>";
          }
          // print_r($y);
          // echo $resultCheck;
        
        ?>

      </table>
    </div>
    <div class="orders" id="orders">
      <table>
        <?php
          
        ?>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th id="idOrd">Orders</th>
          <th>Date</th>
          <th>Price</th>
          <th>Status</th>
          <th>Buttons</th>
        </tr>
        <?php
          
          require "../includes/dbh.inc.php";
          $sql = "SELECT * FROM orders ORDER BY ordId DESC";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck > 0){
            // function terminate($ordId){
            //   require "../includes/dbh.inc.php";
            //   $sql = "SELECT * FROM orders";
            //   mysqli_query($conn, $sql);
            //   if(!isset($_POST['terminate'])){
            //   $sql1 = "UPDATE orders SET orderState = 'terminate' WHERE orders.ordId = ".$ordId."" ;
            //   mysqli_query($conn, $sql1);
            //   echo "success";
            //   }
            // }
            
            while($row = mysqli_fetch_assoc($result)){
              $id= $row['ordId'];
              echo "<tr id=".$id.">
              <td id='a".$id."'>".$row['ordId']."</td>
              <td id='b".$id."'>".$row['username']."</td>
              <td id='c".$id."'>".$row['orders']."</td>
              <td id='d".$id."'>".$row['compDateTime']."</td>
              <td id='e".$id."'>".$row['payment']."</td>
              <td id='f".$id."'>".$row['orderState']."</td>
              <td id='g".$id."'>
              
              <button id='pen".$id."' name='pending' class='pending' onclick='pending(".$id.")'>Pending</button>

              <button id='ready' class='ready' name='rea".$id."' value='rea".$id."' onclick='ready(".$id.")'>Ready</button>

              <button
              id='pur".$id."' class='purchased' name='purchased' onclick='purchased(".$id.")'>Purchased</button>

              <button id='ter".$id."' class='terminate'  name='terminate' onclick='terminate(".$id.")'>Terminate</button></td>
              </tr>";

              // if(isset($_POST['rea4'])){
              //   require "../includes/dbh.inc.php";
              //   $sql1 = "UPDATE orders SET orderState = 'eeadstry' WHERE ordId = 4;";
              //   mysqli_query($conn, $sql1);
              //   echo "success";
              // }
              // else{
              //   // echo "failed";
              // }
            }
          }
          // echo $id."asdfasdf";
          // function pending($id){
          // if(isset($_POST['pending'])){
            // require "../includes/dbh.inc.php";
            // $sql1 = "UPDATE orders SET orderState = 'pending' WHERE orders.ordId = ".$id;
            // mysqli_query($conn, $sql1);
            // echo "success";
          // }
          // }
          // function ready($id){
            
          // }
          // if(isset($_POST['rea2'])){
          //   require "../includes/dbh.inc.php";
          //   $sql1 = "UPDATE orders SET orderState = 'ready' WHERE orders.ordId = ".$id;
          //   mysqli_query($conn, $sql1);
          //   echo "success";
          // }
        
        ?>

      </table>
    </div>
  </div>
</div>

</div>
</div>
<footer class="footer"></footer>
</body>
<script src="../js/order.admin.js"></script>

</html>