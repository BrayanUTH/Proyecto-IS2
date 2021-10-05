<?php 
   
  include ('databaseconnect.php');

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "DELETE FROM cuentas WHERE id_cuentas = $id";
    $result = mysqli_query($con,$query);
    header('location: cuentas_a_pagar.php');
    }
    

  ?>
  
