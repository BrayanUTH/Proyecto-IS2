<?php
include('databaseconnect.php');
session_start();

if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}
?>


<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title">Reporte de Vecinos</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaEstadoCuentaVecino">
          <thead>
            <tr>
              <th>Id vecino</th>
              <th>Nombre</th>
              <th>Casa</th>
              <th>Bloque</th>
              <th>Vehiculos</th>
              <th>Id Anterior</th>
              <th>Ver Estado de Cuenta</th>
            </tr>
          </thead>
          <tbody>
            <!--Detalle de la tabla vecinos -->

          </tbody>
          <tfoot>
            <tr>
              <th>Id vecino</th>
              <th>Nombre</th>
              <th>Casa</th>
              <th>Bloque</th>
              <th>Vehiculos</th>
              <th>Id Anterior</th>
              <th>Ver Estado de Cuenta</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="js/estados_cuenta.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarEstadoCuentaVecino();
  });
</script>
