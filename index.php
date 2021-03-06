<?php

include("databaseconnect.php");
session_start();
if (isset($_SESSION['idusuario'])) {
  header("location: inicio.php");
}
if (!empty($_POST)) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $sql = "SELECT id_vecino, usuario, contrasenia, estado, tipo_usuario FROM vecino WHERE usuario = '$usuario' AND contrasenia = '$password'";
  $resultado = $con->query($sql);
  
  if ($resultado) {
    $row = $resultado->fetch_assoc();
    $_SESSION['idusuario'] = $row['id_vecino'];

    if ($row['tipo_usuario'] == "ADMINISTRADOR" && $row['estado'] == "ACTIVO") {
      header("location:inicio.php");
    }
    if ($row['tipo_usuario'] == "VECINO" && $row['estado'] == "ACTIVO") {
      header("location:inicio_vecino.php");
    }
    if ($row['tipo_usuario'] == "VIGILANTE" && $row['estado'] == "ACTIVO") {
      header("location:inicio_vigilancia.php");
    }
  } else {
    echo "<script>
            alert('Username y/o Password incorrecto');
            window.location = 'index.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Residencial</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
  <!-- SWEETALERT -->
  <link rel="stylesheet" href="plantilla/plugins/sweetalert2/sweetalert2.css">
</head>

<body class="hold-transition login-page" style="background: #00B4DB;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="plantilla/index.html" class="h1"><b>INICIAR SESI&Oacute;N</b></a>
      </div>
      <div class="card-body">
        <form id="login-form" action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" id="usuario" name="usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recuerdame
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">Reestablecer Contrase??a</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plantilla/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="plantilla/dist/js/adminlte.min.js"></script>

  <!-- SWALALERT -->
  <script src="plantilla/plugins/sweetalert2/sweetalert2.min.js"></script>

</body>

</html>