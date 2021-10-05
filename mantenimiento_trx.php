<?php 
  include ('databaseconnect.php');
  session_start();

  if (!isset($_SESSION['idusuario'])) {
    header("location: index.php");
  }

  $iduser = $_SESSION['idusuario'] ;

  $sql = "SELECT id_usuario, usuario, nombre, status FROM usuarios WHERE id_usuario = '$iduser'";
  $resultado = $con->query($sql);
  $row = $resultado->fetch_assoc();
?>

<div class="container">
      <table class="table table-striped">
        <thead>
          <br>
          <h5 class="text-center">Actualizar Ultimas 30 Transacciones</h5>
          <br>
          <tr>
            <th scope="col">Id Transaccion</th>
            <th scope="col">Id Vecino</th>
            <th scope="col">Id Anterior</th>
            <th scope="col">Nombre</th>
            <th scope="col">Periodo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Debito</th>
            <th scope="col">Credito</th>
            <th scope="col">Asentado</th>
            <th scope="col">Accion a ejecutar</th>
          </tr>
        </thead>
        <tbody>
        <!--Detalle de la tabla vecinos -->
          <?php
          $query = "SELECT * FROM saldos_vecinos WHERE creditos > 0 ORDER BY id_transaccion DESC LIMIT 30";
          $result_vecinos = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result_vecinos)){ ?>
            <tr>
              <td> <?php echo $row['id_transaccion'] ?></td>
              <td> <?php echo $row['id_vecino'] ?></td>
              <td> <?php echo $row['id_vecino_anterior'] ?></td>
              <td style="font-size:60%;"> <?php echo $row['nombre_vecino'] ?></td>
              <td> <?php echo $row['periodo'] ?></td>
              <td> <?php echo $row['fecha'] ?></td>
              <td style="font-size:60%;"> <?php echo $row['descripcion'] ?></td>
              <td> <?php echo $row['debito'] ?></td>
              <td> <?php echo $row['creditos'] ?></td>
              <td> <?php echo $row['asentado'] ?></td>
            
              <td style="font-size:50%;">
                <a href="editar_trx.php?id=<?php echo $row['id_transaccion']?>" class="btn btn-secondary">
                  <i class="far fa-edit"></i>
                </a>
                <a href="eliminar_trx.php?id=<?php echo $row['id_transaccion']?>" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            
            </tr>
          <?php } ?>   
        </tbody>
      </table>
</div>
