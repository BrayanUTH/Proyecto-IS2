<?php
    require '../../model/modelo_transacciones.php';

    $mdTran = new ModeloTransacciones();
    
    $idTransaccion = htmlspecialchars($_POST['idTransaccion'], ENT_QUOTES, 'UTF-8');
    $idVecino = htmlspecialchars($_POST['idVecino'], ENT_QUOTES, 'UTF-8');
    $idAnterior = htmlspecialchars($_POST['idAnterior'], ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $periodo = htmlspecialchars($_POST['periodo'], ENT_QUOTES, 'UTF-8');
    $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
    $debito = htmlspecialchars($_POST['debito'], ENT_QUOTES, 'UTF-8');
    $credito = htmlspecialchars($_POST['credito'], ENT_QUOTES, 'UTF-8');
    $asentado = htmlspecialchars($_POST['asentado'], ENT_QUOTES, 'UTF-8');
    $descripcion = htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');

    $consulta = $mdTran->modificarTransaccion($idTransaccion, $idVecino, $idAnterior, $nombre, $periodo,$fecha, $debito, $credito, $asentado, $descripcion);
    echo $consulta;
     
?>