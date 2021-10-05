<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$servername = "localhost";
// $database = "id12632217_residencial";
$database = "residencial";
$username = "id12632217_admin";
$password = "~HQ-!(b*6MF27Vry";
// Create connection
$con = mysqli_connect($servername, $username, $password,$database);
//Check Connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

?>