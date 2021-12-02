<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "156.67.74.151";
$database = "u357103333_residencial";
$username = "u357103333_user1";
$password = "Residencial97!";

// Create connection
$con = mysqli_connect($servername, $username, $password,$database);
//Check Connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

?>