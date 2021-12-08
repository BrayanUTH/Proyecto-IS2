<?php

include('databaseconnect.php');
session_start();

if (!isset($_SESSION['idusuario'])) {
    header("location: index.php");
}

$iduser = $_SESSION['idusuario'];

$sql = "SELECT * FROM vecino WHERE id_vecino = '$iduser'";
$resultado = $con->query($sql);
$row = $resultado->fetch_assoc();

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RFM SOFT</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">

    <!-- PRUEBAS DATATABLE -->
    <link rel="stylesheet" href="plantilla/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plantilla/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plantilla/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plantilla/plugins/datatables-select/css/select.bootstrap4.min.css">

    <!-- SWEETALERT 2 -->
    <link rel="stylesheet" href="plantilla/plugins/sweetalert2/sweetalert2.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span id="txtUsarioDropdown"><?php echo utf8_decode($row['usuario']); ?></span></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="logout.php" class="dropdown-item">
                            <i class="fa fa-power-off mr-2"></i> Cerrar Sesion
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="plantilla/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">RFM SOFT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img id="imagenUsuarioPrincipal" class="img-circle elevation-2" src="img/default.png">
                    </div>
                    <div class="info">
                        <a href="#" id="lblUsuarioSidebar"><?php echo utf8_decode($row['usuario']); ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'view/deposito/vista_mantenimiento_deposito.php')">
                                <i class="nav-icon fas fa-money-check"></i>
                                <p>
                                    Depositos
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'view/vecino/estados_cuenta.php')">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    Estados de Cuenta
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'view/egreso/form_pagos.php')">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Registro de Pagos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'view/convenio/form_arreglos_pago.php')">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    Convenios de Pagos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'view/cargo_mensual/form_cargo_mensual.php')">
                                <i class="nav-icon fas fa-comment-dollar"></i>
                                <p>
                                    Rutina de Cargo Mensual
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'view/vecino/vista_mantenimiento_vecino.php')">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Vecinos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'view/visita/form_visita.php')">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Registro de Visitas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link color-blue-contrast">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Reportes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="cargarContenido('contenido-principal', 'status_general_vecinos.php')">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p>
                                            Reportes Varios
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="contenido-principal">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- CONTENIDO PRINCIPAL -->
            <div class="content">
                <div class="container-fluid">
                    <!-- <div class="row">
                        <input type="text" id="txtIdUsuarioLogeado" value="<?php echo $iduser; ?>" hidden>
                        <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-6">
                            
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                RFM SOFT
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="#">RFM SOFT</a>.</strong> Todos los derechos reservados.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plantilla/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="plantilla/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- AdminLTE App -->
    <script src="plantilla/dist/js/adminlte.min.js"></script>

    <script src="plantilla/dist/js/demo.js"></script>

    <!-- PRUEBAS DATATABLE -->
    <script src="plantilla/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plantilla/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plantilla/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plantilla/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plantilla/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plantilla/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plantilla/plugins/jszip/jszip.min.js"></script>
    <script src="plantilla/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plantilla/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plantilla/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plantilla/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plantilla/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="plantilla/plugins/datatables-select/js/dataTables.select.min.js"></script>

    <!-- SWALALERT -->
    <script src="plantilla/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        function cargarContenido(id, archivo) {
            $("#" + id).load(archivo);
        }
    </script>
</body>

</html>


<?php
// require_once('footer.php');
?>