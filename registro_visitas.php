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
        <h3 class="card-title">ANUNCIAR VISITAS</h3><br>
        <h6>Apreciado vecino(a) debe enviar un registro por cada persona que le visita.</h6>
      </div>

      <form action="action_registro_visitas.php" method="POST">
      <div class="card-body">
              <div class="form-group row"> 
                <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-sm-10">
                  <input type="date" name="fechaVisita" class="form-control" autofocus>
                </div>
              </div>
              <div class="form-group row"> 
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                  <input type="text" name="visitante" class="form-control" placeholder="¿Quién lo visita?" autofocus>               
                </div>
              </div>
              <div class="form-group row"> 
                <label for="inputEmail3" class="col-sm-2 col-form-label"> Cédula</label>
                <div class="col-sm-10">
                  <input type="text" name="visitante" class="form-control" placeholder="Número de identificación del visitante" autofocus>               
                </div>
              </div> 
              <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-success btn-block" name ="registrar_visita" value ="Anunciar"> 
                </div>
              </div>
            </form>  
        </div>
  </div>
</div>
