<?php 
  require('phpqrcode/qrlib.php');


  if(isset($_POST['registrar_visita'])){

        $fecha = $_POST['fechaVisita'];
        $visita = $_POST['visitante'];
        $status = 1;

  $iduser = $_SESSION['idusuario'] ;
  $sql = "SELECT * FROM usuarios WHERE id_usuario = '$iduser'";
  $resultado = $con->query($sql);
  $row = $resultado->fetch_assoc();

        
        //Codigo para insertar datos ingresados a la tabla visitas en mysql

        $query = "INSERT INTO visitas (id_vecino, visitante, fecha, status) VALUES ($iduser, '$visita','$fecha', $status);";
    
        $result = mysqli_query($con,$query);

        $sqlB = "SELECT * FROM visitas  WHERE id_vecino = '$iduser' order by id_visita DESC";
        $resultB = $con->query($sqlB);
        $fila = $resultB->fetch_assoc();


        if(!$result){
            die("Insercion de datos fallida. Regrese a la pagina anterior del navegador.");

        }else {
            
            $dir = 'temp/';

            if(!file_exists($dir))
                mkdir($dir);

            $filename = $dir.$fila['id_visita'].$iduser.'test.png';

            $size = 10;
            $level = 'H';
            $framesize = 1;
            $contenido = 'http://residencialcds3.link/action_permitir_ingreso.php?id='.$fila['id_visita'];

            QRcode::png($contenido,$filename,$level,$size, $framesize); ?>


            <div class="container text-center">
            <h2>Reporte de Visita</h2>
            <h5>Vecino: <?php echo utf8_decode($row['nombre']); ?> </h5>
            <br>

            <?php echo '<img src="'.$filename.'"/>'; ?>
            <br>
            <br>
            <br>
            <a href="logout.php" class="btn btn-danger">Fin de sesion</a>
            <br>
            <br>
            </div>
            
            

            <?php } ?>
            
  <?php } ?>



