<?php 

  session_start();

  if (!isset($_SESSION['idusuario'])) {
    header("location: index.php");
  }

?>
<div class="container p-4">
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Registrar Pago</h3>
        </div>
        <form action="action_registro_pago.php" method="POST">
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-sm-10">
                  <input type="date" name="fechaPago" class="form-control" placeholder="" autofocus>  
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Monto:</label>
                <div class="col-sm-10">
                  <input type="text" name="montoPago" class="form-control" placeholder="Ingrese Monto del Pago" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Gasto</label>
                <div class="col-sm-10">
                  <select name ="tipoGasto" class="form-control">
                  <option value="Seguridad">Seguridad</option>
                  <option value="Aguas de San Pedro">Aguas de San Pedro</option>
                  <option value="Aseo">Aseo</option>
                  <option value="Inversiones">Inversiones o Mantenimiento</option>
                  </select>
                </div>
              </div>
              <div class="form-group row"> 
                <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Ingrese la descripcion del gasto generado"></textarea>
                  <!-- <input type="text" name="detalle" class="form-control" placeholder="Ingrese descripcion del gasto" autofocus> -->
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-success btn-block" name ="registrar_pago" value ="Aplicar"> 
                </div>
             </div> 
            </div>
          </form>
    </div>
</div>

<div class="container">
      <div class="card-header bg-secondary">
        <h3 class="card-title">Mantenimiento de Egresos o Gastos</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="tblegresos">
          <thead>
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
                <td> <?php echo $row['id_cuentas'] ?></td>
                <td> <?php echo $row['descripcion_cuentas'] ?></td>
                <td> <?php echo $row['fecha_pago'] ?></td>
                <td> <?php echo $row['detalle'] ?></td>
                <td> <?php echo $row['monto'] ?></td>
                <td>
                  <a href="editar_egresos.php?id=<?php echo $row['id_cuentas']?>" class="btn btn-secondary">
                    <i class="fas fa-user-edit"></i>
                  </a>
                  <!--<a href="eliminar_egreso.php?id=<?php echo $row['id_cuentas']?>" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </a>-->
                </td>
              
              </tr>
            <?php } ?>   
          </tbody>
        </table>
    </div>
<br>
<br>
<div>


