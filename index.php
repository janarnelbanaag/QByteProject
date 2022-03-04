<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Qbyte Online Cake Shop</title>
  <link rel="stylesheet" href="./css/variables.css" type="text/css" />
  <link rel="stylesheet" href="./css/navbar.css" type="text/css" />
  <link rel="stylesheet" href="./css/index.css" type="text/css" />
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<?php
  include "./includes/header.inc.php";
?>
<div class="bg-img">
  <div class="hero-header">
    <h1>Hero Header</h1>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Consectetur, magni debitis ut commodi officia porro recusandae
      accusamus eius nihil atque.
    </p>
  </div>
  <div class="featured-product">
    <div class="featured-img"></div>
  </div>
</div>
<div class="best-sellers">
  <h1>Best Sellers</h1>
  <ul>
    <li>
      <div id="blueberry">
        <h2>PRODUCT NAME</h2>
        <img src="./img/popular/Blueberry 6x2.jpg" alt="Blueberry.png" />
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad,
          incidunt.
        </p>
        <button class="order-btn">ORDER NOW</button>
        <i class="arrow left1"></i>
        <i class="arrow right1"></i>
      </div>
    </li>
    <li>
      <div id="classic-sansrival">
        <h2>PRODUCT NAME</h2>
        <img src="./img/popular/Classic Sansrival.jpg" alt="classic-sansrival.png" />
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad,
          incidunt.
        </p>
        <button class="order-btn">ORDER NOW</button>
        <i class="arrow left2"></i>
        <i class="arrow right2"></i>
      </div>
    </li>
    <li>
      <div id="duo-medley">
        <h2>PRODUCT NAME</h2>
        <img src="./img/popular/Duo Medley.jpg" alt="duo-medley.png" />
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad,
          incidunt.
        </p>
        <button class="order-btn">ORDER NOW</button>
        <i class="arrow left3"></i>
        <i class="arrow right3"></i>
      </div>
    </li>
  </ul>
</div>
</div>
</div>
<footer class="footer">
  <div class="footer-containter">
    <div class="row">
      <div class="footer-col">
        <h4>Address</h4>
        <ul>
          <li>
            <p>127 A. Luna St. Brgy. Malinao, Pasig, Philippines</p>
          </li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Follow Us</h4>
        <ul>
          <li class="social-links">
            <a href="https://www.facebook.com/qbyteinternet"><i class='fab fa-facebook'
                style='font-size:24px;color:var(--contentColor)'></i>Qbyte Facebook Page</a>

          </li>
          <li class="social-links">
            <a href="https://www.facebook.com/SweetEsCakesPasig"><i class='fab fa-facebook'
                style='font-size:24px;color:var(--contentColor)'></i>Sweet Escakes Facebook Page</a>

          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</body>
<script src="./js/index.js"></script>
<script src="./js/navbar.js"></script>

</html>