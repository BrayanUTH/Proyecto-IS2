<?php
  include ('databaseconnect.php'); 
  
  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $queryA = "SELECT b.id_vecino, b.Nombre, a.DEBITO, a.CREDITOS, a.SALDO
    FROM resumen_saldos_vecinos a INNER JOIN vecinos b
    ON a.VECINO = b.Nombre
    WHERE b.id_vecino = $id";

  $resultA = mysqli_query($con,$queryA);
    if (mysqli_num_rows($resultA)==1) {
      $rowA = mysqli_fetch_array($resultA);
      $id_vecino = $rowA['id_vecino'];
      $nombre_vecino = $rowA['Nombre'];
      $debito = $rowA['DEBITO'];
      $creditos = $rowA['CREDITOS'];
      $saldo = $rowA['SALDO'];
      }
    }
  ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet"> <!--load all styles -->
  <link href="responsive.css" rel="stylesheet"> <!--load all styles -->
    <title>Document</title>
  </head>
  <body>
  
  <div class="container">
  <table class="table table-striped">
    <thead>
      <h5 class="text-center">
      <img src="costasol.jpg" width="175px" height="90px" class="-center">
      <br>
        Estado de Cuenta</h5>
      <br>
      <h6>Vecino(a): <?php echo $rowA['Nombre']?></h6>
      <h5>Debito Aplicados L. <?php echo $rowA['DEBITO']?>.00</h5>
      <h5 style="color: green;">Depositos Aplica. L. <?php echo $rowA['CREDITOS']?>.00</h5>
      <p>__________________________________________</p>
      <h5 style="color: red;">SALDO A LA FECHA  LPS. <?php echo $rowA['SALDO']?>.00</h5>
      
      <tr>
        <!--<th scope="col">Id Transaccion</th>-->
        <!--<th scope="col">Id Transaccion</th>-->
        <!--<th scope="col">Id Anterior</th>-->
        <!--<th scope="col">Nombre Vecino</th>-->
        <!--<th scope="col">Periodo</th>-->
        <th scope="col">Fecha</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Cargos</th>
        <th scope="col">Pagos</th>
        <th scope="col">Saldo</th>
        <!--<th scope="col">Asentado</th>-->
      </tr>
    </thead>
    <tbody>

    <?php

if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $query = "SELECT id_transaccion
  id_vecino,
  id_vecino_anterior,
  nombre_vecino,
  periodo,
  fecha,
  descripcion,
  debito,
  creditos,
  (sum(debito) over ( order by id_transaccion) - sum(creditos) over ( order by id_transaccion)) AS saldo,
  asentado
  FROM saldos_vecinos WHERE id_vecino = $id";

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

         while($row = mysqli_fetch_array($result)){ ?>
            <tr>
              <td > <?php echo $row['fecha'] ?></td>
              <td > <?php echo $row['descripcion'] ?></td>
              <td > <?php echo $row['debito'] ?>.00</td>
              <td > <?php echo $row['creditos'] ?>.00</td>
              <td > <?php echo $row['saldo'] ?>.00</td>
              <!--<td style="font-size:70%;"> <?php echo $row['asentado'] ?></td>            -->
            </tr>
          <?php } ?>   
        </tbody>
      </table>
<br>
<br>
<br>
<div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
  </html>

