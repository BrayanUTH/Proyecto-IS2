<?php 
   
  include ('databaseconnect.php');

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "SELECT * FROM cuentas WHERE id_cuentas = $id";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result)==1) {
      $row = mysqli_fetch_array($result);
      
      $idcuentas = $row['id_cuentas'];
      $tipo = $row['descripcion_cuentas'];
      $fechaPago =$row['fecha_pago'];
      $detalle =  $row['detalle'];
      $monto = $row['monto'];
      
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $tipo = $_POST['tipo'];
    $fechaPago = $_POST['fechaPago'];
    $detalle = $_POST['detalle'];
    $monto = $_POST['monto'];
    

    $query = "UPDATE cuentas SET descripcion_cuentas = '$tipo', fecha_pago = '$fechaPago', detalle = '$detalle', monto = $monto WHERE id_cuentas = $id";
    mysqli_query($con,$query);

    header('location: cuentas_a_pagar.php');
  }


?>

<?php include('navbar.php'); ?>

  
  <div class="container p-4">
  <h5 class="text-center">Actualizar Convenio de Pago </h5>  
  <br>
    <div class="row">
      
      
      <div class="col-md-4 mx-auto">
        <form action="editar_egresos.php?id=<?php echo $_GET['id']?>" method="POST">
          
              <div class="form-group">
              <label>Tipo:</label>
              <input type="text" name="tipo" value="<?php echo $tipo?>" class="form-control">
              </div>
              <div class="form-group">
              <label>Fecha Pago:</label>
              <input type="text" name="fechaPago" value="<?php echo $fechaPago?>" class="form-control">
              </div>
              <div class="form-group">
              <label>Descripción:</label>
              <input type="text" name="detalle" value="<?php echo $detalle?>" class="form-control">
              </div>
              <div class="form-group">
              <label>Monto de Egreso: L.</label>
              <input type="text" name="monto" value="<?php echo $monto?>" class="form-control">
              </div>
          </div>
          <button class="btn btn-success" name="update">
          Actualizar  
          </button>

        </form>
      </div>
    </div>
    
  </div>

