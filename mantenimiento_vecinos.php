<?php

include('databaseconnect.php');
session_start();

if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}

$iduser = $_SESSION['idusuario'];

$sql = "SELECT id_usuario, usuario, nombre, status FROM usuarios WHERE id_usuario = '$iduser'";
$resultado = $con->query($sql);
$row = $resultado->fetch_assoc();

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title">Mantenimiento informacion vecinos</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaMantenimientoVecino">
          <thead>
            <tr>
              <th>Id vecino</th>
              <th>Nombre</th>
              <th>Casa</th>
              <th>Bloque</th>
              <th>Vehiculos</th>
              <th>Id Anterior</th>
              <th>Accion</th>
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
              <th>Accion</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- INICIO MODAL -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de vecino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="col-lg-12">
          <input type="text" id="txtIdVecino" hidden>
          <label for="">Nombre</label>
          <input type="text" class="form-control" id="txtNombre" placeholder="Ingrese su nombre">
        </div>
        <div class="col-lg-12">
          <label for="">Numero de casa</label>
          <input type="text" class="form-control" id="txtNumeroCasa" placeholder="Ingrese el numero de casa">
        </div>
        <div class="col-lg-12">
          <label for="">Numero de bloque</label>
          <input type="text" class="form-control" id="txtNumeroBloque" placeholder="Ingrese el numero de bloque">
        </div>
        <div class="col-lg-12">
          <label for="">Cantidad de Vehiculos</label>
          <input type="text" name="vehiculos"  id="txtVehiculo" class="form-control" placeholder="Qty. Vehiculos">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarInformacionVecino()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<script src="js/vecino.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarMantenimientoVecino();
  });
</script>