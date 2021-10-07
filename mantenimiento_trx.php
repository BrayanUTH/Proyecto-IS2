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
        <h3 class="card-title">Actualizar Ultimas 30 Transacciones</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaTransacciones">
          <thead>
            <tr>
              <th>Id Transaccion</th>
              <th>Id Vecino</th>
              <th>Id Anterior</th>
              <th>Nombre</th>
              <th>Periodo</th>
              <th>Fecha</th>
              <th>Descripcion</th>
              <th>Debito</th>
              <th>Credito</th>
              <th>Asentado</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th>Id Transaccion</th>
              <th>Id Vecino</th>
              <th>Id Anterior</th>
              <th>Nombre</th>
              <th>Periodo</th>
              <th>Fecha</th>
              <th>Descripcion</th>
              <th>Debito</th>
              <th>Credito</th>
              <th>Asentado</th>
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
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Transaccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4 mb-3">
            <input type="hidden" class="form-control" id="txtIdTransaccion">
            <label for="">ID Vecino</label>
            <input type="text" class="form-control" id="txtIdVecino" placeholder="Por favor ingrese el periodo ingrese el ID del vecino">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">ID Anterior</label>
            <input type="text" class="form-control" id="txtIdAnterior" placeholder="Por favor ingrese el periodo ingrese el ID anterior">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Nombre Vecino</label>
            <input type="text" class="form-control" id="txtNombre" placeholder="Por favor ingrese el nombre del vecino">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Periodo</label>
            <input type="text" class="form-control" id="txtPeriodo" placeholder="Por favor ingrese el periodo">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Fecha</label>
            <input type="date" class="form-control" id="txtFecha">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Debito</label>
            <input type="text" class="form-control" id="txtDebito" placeholder="Por favor ingrese el monto cargo">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Credito</label>
            <input type="text" class="form-control" id="txtCredito" placeholder="Por favor ingrese el monto de deposito">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Asentado</label>
            <input type="text" class="form-control" id="txtAsentado" placeholder="Por favor ingrese el asentado">
          </div>
          <div class="col-lg-12">
            <label for="">Descripcion</label>
            <textarea class="form-control" id="txtDescripcion" cols="30" rows="4"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarTransaccion()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->


<script src="js/transacciones.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarTransacciones();
  });
</script>