<?php
include('databaseconnect.php');
session_start();

if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}

$iduser = $_SESSION['idusuario'];
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title">Mantenimiento de Usuarios</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaMantenimientoUsuario">
          <thead>
            <tr>
              <th>Id Usuario</th>
              <th>Usuario</th>
              <th>Password</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th>Id Usuario</th>
              <th>Usuario</th>
              <th>Password</th>
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
          <label for="">Usuario</label>
          <input type="hidden" id="txtIdUsuario">
          <input type="text" class="form-control" id="txtUsuario" placeholder="Ingrese su username">
        </div>
        <div class="col-lg-12">
          <label for="">Password</label>
          <input type="password" class="form-control" id="txtPassword" placeholder="Ingrese el password nuevo">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarUsuario()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<script src="js/usuario.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarMantenimientoUsuario();
  });
</script>