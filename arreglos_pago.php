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
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Registrar Convenio de Pago</h3>
        </div>
        <div class="card card-body">
          <form action="action_registro_convenio.php" method="POST">
            <div class="form-group row"> 
              <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" name="fechaCon" class="form-control" placeholder="" autofocus>
              </div>
            </div>
            <div class="form-group row"> 
              <label for="inputEmail3" class="col-sm-2 col-form-label">Monto Inicial:</label>
              <div class="col-sm-10">
                <input type="text" name="montoCon" class="form-control" placeholder="Ingrese Monto Inicial Convenio" autofocus>
              </div>
            </div>
            <div class="form-group row"> 
              <label for="inputEmail3" class="col-sm-2 col-form-label">Prima:</label>
                <div class="col-sm-10">
                  <input type="text" name="prima" class="form-control" placeholder="Ingrese Prima" autofocus>
                </div> 
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Descuento:</label> 
              <div class="col-sm-10">
              <input type="text" name="descuento" class="form-control" placeholder="Ingrese Descuento en Deuda" autofocus>
              </div>
            </div>
            <div class="form-group row"> 
              <label for="inputEmail3" class="col-sm-2 col-form-label">Saldo:</label> 
              <div class="col-sm-10">
                <input type="text" name="saldo" class="form-control" placeholder="Ingrese el Saldo a Financiar" autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cuotas:</label>  
              <div class="col-sm-10">
                <input type="text" name="cuotas" class="form-control" placeholder="Ingrese Cuotas Plazo" autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cuotas:</label> 
              <div class="col-sm-10">
                <input type="text" name="detalle" class="form-control" placeholder="Ingrese Detalles del Convenio" autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha último pago:</label>
              <div class="col-sm-10">
                <input type="date" name="fechaFin" class="form-control" placeholder="" autofocus>
              </div>  
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Seleccione el Vecino(a):</label>
                <div class="col-sm-10">

                
                  <select name ="idVecino" class="form-control">

                    <?php
                      include("..\conexion\databaseconnect.php");
                      $getVecinos1 = "SELECT * FROM vecinos";
                      $getVecinos2 =  mysqli_query($con, $getVecinos1);
                      
                      while($row = mysqli_fetch_array($getVecinos2))
                      {  
                        $id = $row['id_vecino'];
                        $nombre = $row['Nombre'];
                        
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                        <?php
                    }
                    ?>
                  </select>
                  </div>     
          </div> 
              <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-success btn-block" name ="registrar_convenio" value ="Aplicar">     
                </div>
              </div>
          </form>  
        </div>
    </div> 
</div>

<div class="container">
      <table class="table table-striped">
        <thead>
          <br>
          <h5 class="text">Mantenimiento Convenios de Pago</h5>
          <br>
          <tr>
            <th scope="col">Id Arreglo</th>
            <th scope="col">Id Vecino</th>
            <th scope="col">Fecha Convenio</th>
            <th scope="col">Nombre Vecino</th>
            <th scope="col">Saldo Inicial</th>
            <th scope="col">Prima</th>
            <th scope="col">Descuento</th>
            <th scope="col">Saldo a Financiar</th>
            <th scope="col">Cuotas</th>
            <th scope="col">Descripcion Convenio</th>
            <th scope="col">Fecha Finalizacion</th>
            <th scope="col">Status</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
        <!--Detalle de la tabla vecinos -->
          <?php
          $query = "SELECT * FROM arreglos_de_pago";
          $result_vecinos = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result_vecinos)){ ?>
            <tr>
              <td style="font-size:70%;"> <?php echo $row['id_arreglo'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['id_vecino'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['fecha_arreglo'] ?></td>
              <td style="font-size:60%;"> <?php echo $row['nombre_vecino'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['saldo'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['prima'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['descuentos'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['saldo_restante'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['cuotas_plazo'] ?></td>
              <td style="font-size:60%;"> <?php echo $row['descripcion_arreglo'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['fecha_fin'] ?></td>
              <td style="font-size:70%;"> <?php echo $row['status'] ?></td>
            
              <td>
                <a href="editar_convenios.php?id=<?php echo $row['id_arreglo']?>" class="btn btn-secondary">
                  <i class="fas fa-user-edit"></i>
                </a>
              </td>
            
            </tr>
          <?php } ?>   
        </tbody>
      </table>
<br>
<br>
<div>
