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
              <div class="form-group"> 
                <label> Ingrese Fecha Eje: 2021-08-31</label>
                <input type="text" name="fechaVisita" class="form-control" placeholder="AAAA-MM-DD" autofocus>
              </div>
              <div class="form-group"> 
                <label> Nombre del Visitante:</label>
                <input name="visitante" class="form-control" placeholder="¿Quién lo visita?" autofocus>               
                </input>
              </div> 
            <input type="submit" class="btn btn-success btn-block" name ="registrar_visita" value ="Anunciar"> 
            </form>  
        </div>
  </div>
</div>
