<?php
  
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "qbproject";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// checking if the connection fails
if (!$conn){
  die("Connection failed: ".mysqli_connect_error());
}
// else{
  
// }