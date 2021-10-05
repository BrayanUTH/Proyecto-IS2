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


<!-- 
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Horizontal Form</h3>
  </div>
  <form class="form-horizontal">
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck2">
            <label class="form-check-label" for="exampleCheck2">Remember me</label>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-info">Sign in</button>
      <button type="submit" class="btn btn-default float-right">Cancel</button>
    </div>

  </form>
</div>

-->




<div class="container p-4">
  <!-- <div class="row"> -->

  <div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Registrar Deposito</h3>
    </div>

    <form action="action_registro_deposito.php" method="POST" class="form-horizontal">
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha:</label>
          <div class="col-sm-10">
            <input type="date" name="fechaDep" class="form-control" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Monto del deposito:</label>
          <div class="col-sm-10">
            <input type="number" min="1" name="monto" class="form-control" placeholder="00.00">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Agencia Bancaria:</label>
          <div class="col-sm-10">
            <input type="text" name="banco" class="form-control" placeholder="Ej: Banco Occidente" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Numero Referencia:</label>
          <div class="col-sm-10">
            <input type="text" name="nReferencia" class="form-control" placeholder="Ingrese Numero Referencia" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Vecino o Vecina:</label>
          <div class="col-sm-10">
            <select name="idVecino" class="form-control">

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
            <input type="submit" class="btn btn-success btn-block" name="registrar_deposito" value="Aplicar">
          </div>
        </div>

      </div>
    </form>
  </div>
  <!-- </div> -->
</div>