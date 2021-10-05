<?php 
   
  include ('databaseconnect.php');

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id_usuario = $id";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result)==1) {
      $row = mysqli_fetch_array($result);
      $usuario = $row['usuario'];
      $passwordC = $row['password'];
      
      
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $usuario = $_POST['usuario'];
    $passwordB = $_POST['password'];
   
    $query = "UPDATE usuarios SET usuario = '$usuario', password = '$passwordB' WHERE id_usuario = $id";
    mysqli_query($con,$query);

    header('location: mantenimiento_usuarios.php');
  }

  

?>


<?php include('navbar.php'); ?>

  
  <div class="container p-4">
  <h5 class="text-center">Actualizar datos Usuario</h5>  
  <br>
    <div class="row">
      
      
      <div class="col-md-4 mx-auto">
        <form action="editar_usuarios.php?id=<?php echo $_GET['id']?>" method="POST">
          <div class="form-group">
              <label>Usuario</label>
              <input type="text" name="usuario" value="<?php echo $usuario;?>" class="form-control" placeholder="Edita Nombre">
          </div>
          <div class="form-group">
            <label>Password</label>
              <input type="text" name="password" value="<?php echo $passwordC;?>" class="form-control" placeholder="Edita #casa">
          </div>

          <button class="btn btn-success" name="update">
          Actualizar  
          </button>
        </form>
      </div>
    </div>
    
  </div>

?>