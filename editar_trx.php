<?php 
   
  include ('databaseconnect.php');

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "SELECT * FROM saldos_vecinos WHERE id_transaccion = $id";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result)==1) {
      $row = mysqli_fetch_array($result);
      $id = $row['id_transaccion'];
      $idvecino = $row['id_vecino'];
      $idanterior = $row['id_vecino_anterior'];
      $nombre = $row['nombre_vecino'];
      $periodo = $row['periodo'];
      $fecha = $row['fecha'];
      $descripcion = $row['descripcion'];
      $debito = $row['debito'];
      $creditos = $row['creditos'];
      $asentado = $row['asentado'];

      
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $idvecino = $_POST['idvecino'];
    $idanterior = $_POST['idanterior'];
    $nombre = $_POST['nombre'];
    $periodo = $_POST['periodo'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $debito = $_POST['debito'];
    $creditos = $_POST['creditos'];
    $asentado = $_POST['asentado'];

    $queryb = "UPDATE saldos_vecinos SET
    id_vecino = $idvecino, 
    id_vecino_anterior = $idanterior, 
    nombre_vecino = '$nombre', 
    periodo='$periodo', 
    fecha =  '$fecha', 
    descripcion = '$descripcion', 
    debito = $debito, 
    creditos = $creditos, 
    asentado = '$asentado' 
    WHERE id_transaccion = $id";
    mysqli_query($con,$queryb);

    header('location: mantenimiento_trx.php');
  }

?>

<?php include('navbar.php'); ?>

  
  <div class="container p-4">
  <h5 class="text-center">Actualizar Transacciones</h5>  
  <br>
    <div class="row">
      
      
      <div class="col-md-4 mx-auto">
        <form action="editar_trx.php?id=<?php echo $_GET['id']?>" method="POST">
        <div class="form-group">
              <label>Id Trx</label>
              <input type="text" name="id" value="<?php echo $id?>" class="form-control" placeholder="Id Trx">
          </div>
          <div class="form-group">
              <label>Id Vecino</label>
              <input type="text" name="idvecino" value="<?php echo $idvecino?>" class="form-control" placeholder="Id Vecino">
          </div>
          <div class="form-group">
              <label>Id Anterior</label>
              <input type="text" name="idanterior" value="<?php echo $idanterior?>" class="form-control" placeholder="Id Anterior">
          </div>
          <div class="form-group">
            <label>Nombre</label>
              <input type="text" name="nombre" value="<?php echo $nombre?>" class="form-control" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label>Periodo</label>
              <input type="text" name="periodo" value="<?php echo $periodo?>" class="form-control" placeholder="Periodo">
          </div>
          <div class="form-group">
              <label>Fecha</label>
              <input type="text" name="fecha" value="<?php echo $fecha?>" class="form-control" placeholder="Fecha">
          </div>
          <div class="form-group">
              <label>Descripcion</label>
              <input type="text" name="descripcion" value="<?php echo $descripcion?>" class="form-control" placeholder="Descripcion">
          </div>
          <div class="form-group">
              <label>Debito</label>
              <input type="text" name="debito" value="<?php echo $debito?>" class="form-control" placeholder="Monto Cargo">
          </div>
          <div class="form-group">
              <label>Credito</label>
              <input type="text" name="creditos" value="<?php echo $creditos?>" class="form-control" placeholder="Monto Deposito">
          </div>
          <div class="form-group">
            <label>Asentado</label>
              <input type="text" name="asentado" value="<?php echo $asentado?>" class="form-control" placeholder="Asentado">
          </div>
          <button class="btn btn-success" name="update">
          Actualizar  
          </button>
          
        </form>
      </div>
    </div>
    
  </div>
