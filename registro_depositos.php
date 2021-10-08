<?php
include('databaseconnect.php');
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

    <!-- <form action="action_registro_deposito.php" method="POST" class="form-horizontal"> -->
    <form class="form-horizontal">
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
          <div class="col-sm-10">
            <input type="date" name="fechaDep" id="txtFecha" class="form-control" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Monto del deposito:</label>
          <div class="col-sm-10">
            <input type="number" min="1" name="monto" id="txtMonto" class="form-control" placeholder="00.00">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Agencia Bancaria:</label>
          <div class="col-sm-10">
            <input type="text" name="banco" class="form-control" id="" placeholder="Ej: Banco Occidente" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Numero Referencia:</label>
          <div class="col-sm-10">
            <input type="text" name="nReferencia" class="form-control" id="" placeholder="Ingrese Numero Referencia" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Vecino o Vecina:</label>
          <div class="col-sm-10">
            <select name="idVecino" class="form-control" id="">

              <?php
              include("databaseconnect.php");
              $getVecinos1 = "SELECT * FROM vecinos";
              $getVecinos2 =  mysqli_query($con, $getVecinos1);

              while ($row = mysqli_fetch_array($getVecinos2)) {
                $id = $row['id_vecino'];
                $nombre = $row['Nombre'];
                $casa = $row['Casa'];
                $bloque = $row['Bloque'];
                $vehiculos = $row['vehiculos'];
                $id_anterior = $row['id_anterior'];

              ?>
                <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <button type="button" class="btn btn-success btn-block" onclick="registrarDeposito()" >Aplicar </button>
            <!-- <input type="submit" class="btn btn-success btn-block" name="registrar_deposito" value="Aplicar"> -->
          </div>
        </div>

      </div>
    </form>
  </div>
  <!-- </div> -->
</div>
<script src="js/depositos.js?rev=<?php echo time(); ?>"></script>