<?php
session_start();
if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title">Estatus General por Vecinos</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaEstatusGeneralVecinos">
          <thead>
            <tr>
              <th>Vecino</th>
              <th>Cargos</th>
              <th>Pagos</th>
              <th>Saldo</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th>Vecino</th>
              <th>Cargos</th>
              <th>Pagos</th>
              <th>Saldo</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="js/vecino.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    // listarEstatusGeneralVecino();
  });
</script>