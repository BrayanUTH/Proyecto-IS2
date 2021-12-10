<?php
session_start();

if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}
?>

<div class="container p-4">
 

  <div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Registrar Convenio</h3>
    </div>

    <form class="form-horizontal" id="frmRegistroConvenio">
      <div class="card-body">
        <!-- <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
          <div class="col-sm-10">
            <input type="date" id="txtFecha" class="form-control" autofocus>
          </div>
        </div> -->
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Cargo:</label>
          <div class="col-sm-10">
            <select id="cboCargo" class="form-control">


            </select>
          </div>
        </div>
        
          <div class="form-group row">
            <label for="inputEmail3" class="monto col-sm-2 col-form-label" >Monto Inicial:</label>
            <div class="col-sm-10">
              <input type="number" min="1" id="txtMonto" class="form-control" placeholder="00.00" readonly>
              <input type="hidden" id="txtIdConvenio">
            </div>
          </div>
          <div class="losInput">
          <div class="form-group row">
            <label for="inputEmail3" class="monto col-sm-2 col-form-label" >Prima:</label>
            <div class="col-sm-10">
              <input type="number" min="1" id="txtPrima" class="form-control" placeholder="00.00" >
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="monto col-sm-2 col-form-label" >Descuento:</label>
            <div class="col-sm-10">
              <input type="number" min="1" id="txtDescuento" class="form-control" placeholder="00.00" >
            </div>
          </div>
        </div>
        <div class="inputTotal">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label" >Saldo:</label>
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
        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <button type="button" class="btn btn-success btn-block" onclick="registrarConvenio()" id="btnAgregar">Aplicar </button>
            <button type="button" class="btn btn-success btn-block" onclick="editarConvenio()" id="btnEditar">Aplicar </button>
          </div>
        </div>

      </div>
    </form>


  </div>
  <!-- </div> -->
</div>

<hr>

<div class="my-4 mx-5">
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



<script src="js/convenios.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarComboVecino();
    listarComboCargo();
    listarMantenimientoConvenio();
  });
</script>