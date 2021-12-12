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
        <h3 class="card-title">MANTENIMIENTO DE CONVENIO</h3>
      </div>
      <div class="card-body">
        <div class="text-right">
          <button type="button" class="btn btn-info px-5" onclick="abrirModal();">Registrar Convenio</button>
        </div>
        <table class="table table-bordered table-striped mt-5" id="tablaMantenimientoConvenio">
          <thead>
            <tr>
              <th>#</th>
              <th>Fecha Inicio</th>
              <th>Monto Inicial</th>
              <th>Prima</th>
              <th>Descuento</th>
              <th>Saldo Restante</th>
              <th>Cuotas</th>
              <th>Fecha Ultimo Pago</th>
              <th>Vecino</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <!--Detalle de la tabla vecinos -->

          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Fecha Inicio</th>
              <th>Monto Inicial</th>
              <th>Prima</th>
              <th>Descuento</th>
              <th>Saldo Restante</th>
              <th>Cuotas</th>
              <th>Fecha Ultimo Pago</th>
              <th>Vecino</th>
              <th>Acción</th>
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
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRAR CONVENIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmRegistroConvenio" name="frm">
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cargo:</label>
              <div class="col-sm-10">
                <select id="cboCargo" class="form-control">


                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="monto col-sm-2 col-form-label">Monto Inicial:</label>
              <div class="col-sm-10">
                <input type="number" min="1" id="txtMonto" class="form-control" placeholder="00.00" readonly>
                <input type="hidden" id="txtIdConvenio">
              </div>
            </div>
            <div class="losInput">
              <div class="form-group row">
                <label for="inputEmail3" class="monto col-sm-2 col-form-label">Prima:</label>
                <div class="col-sm-10">
                  <input type="number" min="1" id="txtPrima" class="form-control" placeholder="00.00">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="monto col-sm-2 col-form-label">Descuento:</label>
                <div class="col-sm-10">
                  <input type="number" min="1" id="txtDescuento" class="form-control" placeholder="00.00">
                </div>
              </div>
            </div>
            <div class="inputTotal">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Saldo:</label>
                <div class="col-sm-10">
                  <input type="number" min="1" id="txtSaldo" class="form-control" placeholder="00.00" readonly>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cuotas:</label>
              <div class="col-sm-10">
                <input type="number" min="1" id="txtCuota" class="form-control" placeholder="00.00">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Detalles:</label>
              <div class="col-sm-10">
                <textarea rows="3" cols="3" class="form-control" id="txtDetalles" maxlength=100></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha último pago:</label>
              <div class="col-sm-10">
                <input type="date" id="txtFechaUltimo" class="form-control" autofocus>
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
              <label for="inputEmail13" class="col-sm-2 col-form-label">ESTADO:</label>
              <div class="col-sm-10">
                <select class="form-control" id="cboEstado">
                  <option value="Pendiente">Pendiente</option>
                  <option value="Cancelado">Cancelado</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-success" onclick="registrarConvenio()" id="btnAgregar">APLICAR</button>
        <button type="button" class="btn btn-success" onclick="editarConvenio()" id="btnEditar">APLICAR</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->


<script src="js/convenios.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarComboVecino();
    listarComboCargo();
    listarMantenimientoConvenio();
  });
</script>