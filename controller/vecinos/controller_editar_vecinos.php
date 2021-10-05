<?php
    require '../../model/modelo_estado_cuenta.php';

    $mec = new ModeloVecino();
    
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $casa = htmlspecialchars($_POST['casa'], ENT_QUOTES, 'UTF-8');
    $bloque = htmlspecialchars($_POST['bloque'], ENT_QUOTES, 'UTF-8');
    $vehiculo = htmlspecialchars($_POST['vehiculo'], ENT_QUOTES, 'UTF-8');

    $consulta = $mec->modificarVecino($id, $nombre, $casa, $bloque, $vehiculo);
    echo $consulta;
     
?>