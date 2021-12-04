<?php
session_start();

if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}
?>

<div class="container p-4">
  <!-- <div class="row"> -->

  <div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Registrar Deposito</h3>
    </div>

    <form class="form-horizontal" id="frmRegistroDeposito">
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
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <button type="button" class="btn btn-success btn-block" onclick="registrarDeposito()">Aplicar </button>
          </div>
        </div>

      </div>
    </form>


  </div>
  <!-- </div> -->
</div>

<hr>

<div class="my-4 mx-5">
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



<script src="js/depositos.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarComboVecino();
    listarMantenimientoDeposito();
  });
</script>