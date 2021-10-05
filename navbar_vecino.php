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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Res. Costa del Sol 3ra Etapa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet"> <!--load all styles -->
  <link href="responsive.css" rel="stylesheet"> <!--load all styles -->
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light white">
  <a class="navbar-brand" href="inicio_vecino.php"><img src="costasol.jpg" width="120" height="60" class="d-inline-block"> Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">     
      <li class="nav-item active">
          <a class="nav-link">Bienvenido(a) 
            <?php echo utf8_decode($row['nombre']); ?>
          </a>
      </li>
    </ul>
  </div>
</nav>
<br>
