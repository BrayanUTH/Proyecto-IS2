<?php
session_start();

if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">MANTENIMIENTO DEPOSITO</h3>
      </div>
      <div class="card-body">
        <div class="text-right">
          <button type="button" class="btn btn-info px-5" onclick="abrirModal();">Registrar Deposito</button>
        </div>
        <table class="table table-bordered table-striped mt-5" id="tablaMantenimientoDeposito">
          <thead>
            <tr>
              <th>#</th>
              <th>Vecino</th>
              <th>Fecha</th>
              <th>Monto</th>
              <th>Agencia Bancaria</th>
              <th>Nº Referencia</th>
            </tr>
          </thead>
          <tbody>
            <!--Detalle de la tabla vecinos -->

          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Vecino</th>
              <th>Fecha</th>
              <th>Monto</th>
              <th>Agencia Bancaria</th>
              <th>Nº Referencia</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>




<!-- INICIO MODAL -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRAR DEPOSITO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmRegistroDeposito" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
              <div class="col-sm-10">
                <input type="date" id="txtFecha" class="form-control" autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Monto del deposito:</label>
              <div class="col-sm-10">
                <input type="number" min="1" id="txtMonto" class="form-control" placeholder="00.00">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Agencia Bancaria:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="txtAgencia" placeholder="Ej: Banco Occidente">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Numero Referencia:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="txtNumeroReferencia" placeholder="Ingrese Numero Referencia">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Vecino o Vecina:</label>
              <div class="col-sm-10">
                <select id="cboVecino" class="form-control">


                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cargo:</label>
              <div class="col-sm-10">
                <select id="cboCargo" class="form-control">


                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-primary" onclick="registrarDeposito()">APLICAR</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->



<script src="js/depositos.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarComboVecino();
    listarMantenimientoDeposito();
    listarComboCargo();
  });
</script>