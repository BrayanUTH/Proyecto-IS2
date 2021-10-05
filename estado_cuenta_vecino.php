<?php 
  require_once('navbar_vecino.php');

?>

<div class="container">
      <table class="table table-striped">
        <thead>
          <br>
          <h5 class="text-center">Reporte de Vecinos</h5>
          <br>
          <tr>
            <th scope="col">Id vecino</th>
            <th scope="col">Nombre</th>
            <th scope="col">Casa</th>
            <th scope="col">Bloque</th>
            <th scope="col">Vehiculos</th>
            <th scope="col">Id Anterior</th>
            <th scope="col">Ver Estado de Cuenta</th>
          </tr>
        </thead>
        <tbody>
        <!--Detalle de la tabla vecinos -->
          <?php
          $query = "SELECT * FROM vecinos WHERE id_vecino = $iduser";
          $result_vecinos = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result_vecinos)){ ?>
            <tr>
              <td> <?php echo $row['id_vecino'] ?></td>
              <td> <?php echo $row['Nombre'] ?></td>
              <td> <?php echo $row['Casa'] ?></td>
              <td> <?php echo $row['Bloque'] ?></td>
              <td> <?php echo $row['vehiculos'] ?></td>
              <td> <?php echo $row['id_anterior'] ?></td>
            
              <td>
                <a href="impresion_cuenta_vecino.php?id=<?php echo $row['id_vecino']?>" class="btn btn-secondary">
                  <i class="fas fa-print"></i>
                </a>
              </td>
            
            </tr>
          <?php } ?>   
        </tbody>
      </table>
</div>



?>
