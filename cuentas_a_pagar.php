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



<div class="container p-4">
  <div class="row">
      <div class="col-md-4">
        <div class="card card-body">
          <h6>Registro de Pago</h6>
          <br>
          <form action="action_registro_pago.php" method="POST">
            <div class="form-group"> 
              <input type="text" name="fechaPago" class="form-control" placeholder="Ingrese Fecha AAAA-MM-DD" autofocus>
            </div>
            <div class="form-group"> 
              <input type="text" name="montoPago" class="form-control" placeholder="Ingrese Monto del Pago" autofocus>
            </div>
            <div class="form-group">
              <label>Seleccione el Tipo de Gasto</label>
              <select name ="tipoGasto" class="form-control">
              <option value="Seguridad">Seguridad</option>
              <option value="Aguas de San Pedro">Aguas de San Pedro</option>
              <option value="Aseo">Aseo</option>
              <option value="Inversiones">Inversiones o Mantenimiento</option>
              </select>
            </div>
            <div class="form-group"> 
              <input type="text" name="detalle" class="form-control" placeholder="Ingrese descripcion del gasto" autofocus>
            </div> 
            <input type="submit" class="btn btn-success btn-block" name ="registrar_pago" value ="Aplicar"> 
          </form>  
        </div>
      </div>
  </div> 
</div>



<div class="container">
      <table class="table table-striped">
        <thead>
          <br>
          <h5 class="text">Mantenimiento de Egresos o Gastos</h5>
          <br>
          <tr>
            <th scope="col">Id Egreso</th>
            <th scope="col">Tipo de Egreso o Gasto</th>
            <th scope="col">Fecha del Egreso</th>
            <th scope="col">Descripción de Egreso o Gasto</th>
            <th scope="col">Monto</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
        <!--Detalle de la tabla vecinos -->
          <?php
          $query = "SELECT * FROM cuentas";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result)){ ?>
            <tr>
              <td style="font-size:70%;"> <?php echo $row['id_cuentas'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['descripcion_cuentas'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['fecha_pago'] ?></td>
              <td style="font-size:60%;"> <?php echo $row['detalle'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['monto'] ?></td>
              <td>
                <a href="editar_egresos.php?id=<?php echo $row['id_cuentas']?>" class="btn btn-secondary">
                  <i class="fas fa-user-edit"></i>
                </a>
                <a href="eliminar_egreso.php?id=<?php echo $row['id_cuentas']?>" class="btn btn-danger">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            
            </tr>
          <?php } ?>   
        </tbody>
      </table>
<br>
<br>
<div>


