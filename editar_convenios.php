<?php 
   
  include ('databaseconnect.php');

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "SELECT * FROM arreglos_de_pago WHERE id_arreglo = $id";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result)==1) {
      $row = mysqli_fetch_array($result);
      
      $idarreglo = $row['id_arreglo'];
      $id_vecino = $row['id_vecino'];
      $fechaCon =$row['fecha_arreglo'];
      $nombre =  $row['nombre_vecino'];
      $saldo = $row['saldo'];
      $prima = $row['prima'];
      $descuento =  $row['descuentos'];
      $saldoRestante= $row['saldo_restante'];
      $cuotas = $row['cuotas_plazo'];
      $detalle = $row['descripcion_arreglo'];
      $fechaFin = $row['fecha_fin'];
      $status = $row['status'];

      
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $detalle = $_POST['detalle'];
    $fechaFin = $_POST['fechaFin'];
    $status = $_POST['status'];
    

    $query = "UPDATE arreglos_de_pago SET descripcion_arreglo = '$detalle', fecha_fin = '$fechaFin', status = '$status' WHERE id_arreglo = $id";
    mysqli_query($con,$query);

    header('location: arreglos_pago.php');
  }


?>


<?php include('..\includes\navbar.php'); ?>

  
  <div class="container p-4">
  <h5 class="text-center">Actualizar Convenio de Pago </h5>  
  <br>
    <div class="row">
      
      
      <div class="col-md-4 mx-auto">
        <form action="editar_convenios.php?id=<?php echo $_GET['id']?>" method="POST">
          
              <div class="form-group">
              <label name='nombre'>Nombre Vecino: <?php echo $nombre?></label>
              </div>
              <div class="form-group">
              <label name='fechaCon'>Fecha Inicio: <?php echo $fechaCon?></label>
              </div>
              <div class="form-group">
              <label name='montoCon'>Monto Inicial:L.<?php echo $saldo?></label>
              </div>
              <div class="form-group">
              <label name="prima">Prima Acordada:  L.<?php echo $prima?></label>
              </div>
              <div class="form-group">
              <label name="descuento">Descuento:   L.<?php echo $descuento?></label>
              </div>
              <div class="form-group">
              <label name="saldo">Saldo Restante:  L.<?php echo $saldoRestante?></label>
              </div>
              <div class="form-group">
              <label name="cuotas">Cuotas: <?php echo $cuotas?> cuotas</label>
          <div class="form-group">
            <label>Detalle de Convenio</label>
              
              <input type="text" name="detalle" value="<?php echo $detalle?>" class="form-control">
            
          </div>
          <div class="form-group">
            <label>Fecha Cancelacion Deuda</label>
              <input type="text" name="fechaFin" value="<?php echo $fechaFin?>" class="form-control" placeholder="Edita #bloque">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name ="status" class="form-control">
              <option value="ACTIVO">ACTIVO</option>
              <option value="CANCELADO">CANCELADO</option>
            </select>
              
          </div>
          <button class="btn btn-success" name="update">
          Actualizar  
          </button>

        </form>
      </div>
    </div>
    
  </div>

