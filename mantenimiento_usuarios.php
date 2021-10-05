<?php 
  include ('databaseconnect.php');
  session_start();

  if (!isset($_SESSION['idusuario'])) {
    header("location: index.php");
  }

  $iduser = $_SESSION['idusuario'] ;

  $sql = "SELECT id_usuario, usuario, nombre, status FROM usuarios WHERE id_usuario = '$iduser'";
  $resultado = $con->query($sql);
  $row = $resultado->fetch_assoc();
?>

<div class="container">
      <table class="table table-striped">
        <thead>
          <br>
          <h5 class="text-center">Mantenimiento de Usuarios</h5>
          <br>
          <tr>
            <th scope="col">Id Usuario</th>
            <th scope="col">Usuario</th>
            <th scope="col">Password</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
        <!--Detalle de la tabla vecinos -->
          <?php
          $query = "SELECT * FROM usuarios";
          $result_usuarios = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result_usuarios)){ ?>
            <tr>
              <td> <?php echo $row['id_usuario'] ?></td>
              <td> <?php echo $row['usuario'] ?></td>
              <td> <?php echo $row['password'] ?></td>
              <td>
                <a href="editar_usuarios.php?id=<?php echo $row['id_usuario']?>" class="btn btn-secondary">
                  <i class="fas fa-user-edit"></i>
                </a>
              </td>
            
            </tr>
          <?php } ?>   
        </tbody>
      </table>
</div>
