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
  <link rel="stylesheet" href="../css/admin.index.css" type="text/css" />
  <link rel="stylesheet" href="../css/inventory.admin.css" type="text/css" />
  <script src="https://kit.fontawesome.com/b57fb6654c.js" crossorigin="anonymous"></script>
</head>
<?php
  include "../includes/header-admin.inc.php"
?>
<div class="bg-img">
  <div class="main-admin">
    <div class="main-admin-heading">
      <h1 class="header">YOUR INVENTORY</h1>
    </div>
    <hr>
    <div class="inventory-content" id="inventory-content">
      <table>
        <thead>
          <th>Id</th>
          <th id="pic">Picture</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th id="stats">Status</th>
        </thead>
        <?php
          require "../includes/dbh.inc.php";
          $sql = "SELECT * FROM products";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          
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
              echo "<tr>
              <td>".$row['proId']."</td>
              <td><img id='picwidth' src='data:image;base64,".base64_encode($row['proPic'])."' alt='product image'></td>
              <td>".$row['proName']."</td>
              <td>".$row['proDesc']."</td>
              <td>".$row['proPrice']."</td>
              <td><select>
              <option>Available</option>
              <option>Unavailable</option>
              </select></td></tr>";
            }
        ?>
      </table>
    </div>
  </div>

</div>
</div>
<footer class="footer"></footer>
</body>
<script src="../js/navbar.js"></script>
<script src="../js/inventory.admin.js"></script>

</html>