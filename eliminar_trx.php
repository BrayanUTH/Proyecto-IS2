<?php 
   
  include ('databaseconnect.php');

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "DELETE FROM saldos_vecinos WHERE id_transaccion = $id";
    $result = mysqli_query($con,$query);
    header('location: mantenimiento_trx.php');
  }


?>

