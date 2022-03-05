<body>
  <div class="container">
    <div class="content">
      <div class="navbar">
        <nav>
          <ul>
            <li class="hamb-menu">
              <a href="#"><img src="./img/icons/menu-icon.svg" alt="" /></a>
            </li>
            <li class="company-name"><a href="./index.php">QBYTE CAKE SHOP</a></li>

            <li class="cart-mobile">
              <a href="#" id="cartmob"><img src="./img/icons/cart-icon.svg" alt="" /></a>
            </li>
            <div class="push"></div>
            <li id="links">
              <ul>
                <!-- Checking if user is logged in or not -->
                <?php
                  if (isset($_SESSION['useremail'])){
                    echo '<li><a href="./products.php">Order</a></li>';
                    echo '<li><a href="./includes/logout.inc.php">Logout</a></li>';
                    echo '<li><a href="./profile.php"><img src="./img/icons/user-icon.svg" alt="" /></a></li>';
                  }
                  else{
                    echo '<li class="account"><a href="./account.php">Account</a></li>';
                  }
                ?>
              </ul>
            </li>
          </ul>
        </nav>
      </div>