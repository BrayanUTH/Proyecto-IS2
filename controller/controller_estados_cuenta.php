<?php

    require '../model/modelo_estado_cuenta.php';

    $mec = new ModeloEstadoCuenta();
    $consulta = $mec->listarEstadoCuenta();
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