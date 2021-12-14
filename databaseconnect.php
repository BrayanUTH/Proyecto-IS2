<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
$database = "residencial";
$username = "root";
$password = "";

// Create connection
$con = mysqli_connect($servername, $username, $password,$database);
//Check Connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

?>