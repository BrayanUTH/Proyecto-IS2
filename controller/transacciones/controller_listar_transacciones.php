<?php

    require '../../model/modelo_transacciones.php';

    $mdTran = new ModeloTransacciones();
    $consulta = $mdTran->listarTransacciones();
    if ($consulta) {
        echo json_encode($consulta);
    } else {

        echo '{
                "sEcho": 1, 
                "iTotalRecords": "0", 
                "ITotalDisplayRecords": "0", 
                "aaData": [] 
            }';
    }

?>