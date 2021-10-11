<?php
    require '../../model/modelo_usuario.php';

    $mec = new ModeloUsuario();
    
    $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
    $monto = htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');

    // $consulta = $mec->registrarDeposito($fecha, $monto);
    // echo $consulta;
     
?>