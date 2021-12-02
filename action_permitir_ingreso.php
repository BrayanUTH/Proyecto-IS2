<?php
require_once('navbar_vigilancia.php');
include("databaseconnect.php");

echo 'LECTURA EXITOSA';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $queryB = "SELECT * FROM visitas WHERE id_visita = $id AND status = '1'";
  $resultB = mysqli_query($con, $queryB);
  $row = mysqli_fetch_array($resultB);

  if (mysqli_num_rows($resultB)) {

    $query = "UPDATE visitas SET status = 2 WHERE id_visita = $id";
    $result = mysqli_query($con, $query);

?>
    <div class="container">
      <div class="alert alert-success text-center" role="alert">
        PERMITIR INGRESO A LA RESIDENCIAL - VISITANTE AUTORIZADO
      </div>
    </div>
    <!-- <h1 style="color:green; font-size: 200%;">PERMITIR INGRESO</h1> -->
  <?php
  } else { ?>
    <div class="alert alert-danger" role="alert">
      <p>Este codigo ya fue escaneado</p>
      <p>Pedir a la visita que llame al vecino para anunciarlo en vigilancia</p>
    </div>
    <!-- <H1 style="color:red; font-size: 200%;">
      Este codigo ya fue registrado.</H1>
    <br>
    <h2>Pedir a la visita que llame al vecino</h2>
    <h2>para anunciarlo en vigilancia</h2> -->
    < <?php  }
  }
      ?>