<?php

    require '../../model/modelo_pago.php';

    $mec = new ModeloPago();
    $consulta = $mec->listarPago();
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