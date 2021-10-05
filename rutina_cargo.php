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
          <h6>Aplicar Cargo Mensual a los vecinos</h6>
          <br>
          <form action="action_rutina_cargo.php" method="POST">
            <div class="form-group"> 
              <input type="text" name="fechaCargo" class="form-control" placeholder="Fecha AAAA-MM-DD" autofocus>
            </div>
            <div class="form-group"> 
              <input type="text" name="monto" class="form-control" placeholder="Monto del Cargo" autofocus>
            </div>
            <div class="form-group"> 
              <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" autofocus>
            </div>
          <input type="submit" class="btn btn-success btn-block" name ="rutina_cargo" value ="Aplicar"> 
          </form>  
        </div>
      </div>
  </div> 
</div>
