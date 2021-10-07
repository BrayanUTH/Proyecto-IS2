<?php
    require '../../model/modelo_transacciones.php';

    $mdTran = new ModeloTransacciones();
    
    $idTransaccion = htmlspecialchars($_POST['idTransaccion'], ENT_QUOTES, 'UTF-8');

    $consulta = $mdTran->eliminarTransaccion($idTransaccion);
    echo $consulta;
     
?>