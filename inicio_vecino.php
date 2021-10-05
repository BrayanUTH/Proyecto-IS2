<?php 
  
  require_once('navbar_vecino.php');

?>

<br>
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Registro de Visitas</h5>
        <p class="card-text">Anunciar a sus visitas para que puedan ingresar.</p>
        <a href="registro_visitas_vecino.php" class="btn btn-warning">Continue..</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Estados de Cuenta</h5>
        <p class="card-text">Visualizar e imprimir el estado de cuenta de cada vecino.</p>
        <a href="estado_cuenta_vecino.php" class="btn btn-warning">Continue..</a>
      </div>
    </div>
  </div>
    <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cierre Sesion</h5>
        <p class="card-text">Por favor cierre sesion al dejar de usar la aplicacion.</p>
        <a href="logout.php" class="btn btn-danger">Fin de sesion</a>
      </div>
    </div>
  </div>
</div>


<?php 
  require_once('footer.php');
?>