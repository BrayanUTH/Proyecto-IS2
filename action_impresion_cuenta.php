<?php
 include("databaseconnect.php");


 if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "SELECT `residencial`.`saldos_vecinos`.`id_transaccion` AS `id_transaccion`,
    `residencial`.`saldos_vecinos`.`id_vecino` AS `id_vecino`,
    `residencial`.`saldos_vecinos`.`id_vecino_anterior` AS `id_vecino_anterior`,
    `residencial`.`saldos_vecinos`.`nombre_vecino` AS `nombre_vecino`,
    `residencial`.`saldos_vecinos`.`periodo` AS `periodo`,
    `residencial`.`saldos_vecinos`.`fecha` AS `fecha`,
    `residencial`.`saldos_vecinos`.`descripcion` AS `descripcion`,
    `residencial`.`saldos_vecinos`.`debito` AS `debito`,
    `residencial`.`saldos_vecinos`.`creditos` AS `creditos`,
    (sum(`residencial`.`saldos_vecinos`.`debito`) over ( order by `residencial`.`saldos_vecinos`.`id_transaccion`) - sum(`residencial`.`saldos_vecinos`.`creditos`) over ( order by `residencial`.`saldos_vecinos`.`id_transaccion`)) AS `saldo`,
    `residencial`.`saldos_vecinos`.`asentado` AS `asentado` 
    FROM `residencial`.`saldos_vecinos` WHERE id_vecino = $id";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result)==1) {
      $row = mysqli_fetch_array($result);
      $id = $row['id_transaccion'];
      $id_vecino = $row['id_vecino'];
      $id_vecino_anterior = $row['id_vecino_anterior'];
      $nombre_vecino = $row['nombre_vecino'];
      $periodo = $row['periodo'];
      $fecha = $row['fecha'];
      $descripcion = $row['descripcion'];
      $debito = $row['debito'];
      $creditos = $row['creditos'];
      $saldo = $row['saldo'];
      $asentado = $row['asentado'];
      
    }
  }



?>