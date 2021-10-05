<?php 
   
  include ('databaseconnect.php');

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "SELECT * FROM vecinos WHERE id_vecino = $id";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result)==1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['Nombre'];
      $casa = $row['Casa'];
      $bloque = $row['Bloque'];
      $vehiculos = $row['vehiculos'];

      
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $casa = $_POST['casa'];
    $bloque = $_POST['bloque'];
    $vehiculos = $_POST['vehiculos'];

    $query = "UPDATE vecinos SET Nombre = '$nombre', Casa = $casa, Bloque = $bloque, vehiculos=$vehiculos WHERE id_vecino = $id";
    mysqli_query($con,$query);

    header('location: mantenimiento_vecinos.php');
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
  
    $query = "UPDATE saldos_vecinos SET nombre_vecino = '$nombre' WHERE id_vecino = $id";
    mysqli_query($con,$query);

    header('location: mantenimiento_vecinos.php');
  }

?>


<?php include('navbar.php'); ?>

  
  <div class="container p-4">
  <h5 class="text-center">Actualizar datos de vecino</h5>  
  <br>
    <div class="row">
      
      
      <div class="col-md-4 mx-auto">
        <form action="editar_vecinos.php?id=<?php echo $_GET['id']?>" method="POST">
          <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="nombre" value="<?php echo $nombre?>" class="form-control" placeholder="Edita Nombre">
          </div>
          <div class="form-group">
            <label>Numero de Casa</label>
              <input type="text" name="casa" value="<?php echo $casa?>" class="form-control" placeholder="Edita #casa">
          </div>
          <div class="form-group">
            <label>Numero de Bloque</label>
              <input type="text" name="bloque" value="<?php echo $bloque?>" class="form-control" placeholder="Edita #bloque">
          </div>
          <div class="form-group">
            <label>Cantidad de Vehiculos</label>
              <input type="text" name="vehiculos" value="<?php echo $vehiculos?>" class="form-control" placeholder="Qty. Vehiculos">
              <input type="text" name="idanterior" value="<?php echo $idanterior?>" hidden>
          </div>
          <button class="btn btn-success" name="update">
          Actualizar  
          </button>
        </form>
      </div>
    </div>
    
  </div>
