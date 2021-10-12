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
      <h3 class="card-title">Rutina de Cargo Mensual</h3><br>
      <h6>Aplicar Cargo Mensual a los vecinos</h6>
    </div>
    <form action="action_rutina_cargo.php" method="POST">
      <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" name="fechaCargo" class="form-control" autofocus>
              </div> 
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Monto:</label>
              <div class="col-sm-10">
                <input type="text" name="monto" class="form-control" placeholder="Monto del Cargo" autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción:</label>
              <div class="col-sm-10">
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" autofocus>
              </div> 
            </div>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <input type="submit" class="btn btn-success btn-block" name ="rutina_cargo" value ="Aplicar"> 
              </div>
            </div>
        </div>
    </form> 
  </div>
</div>
