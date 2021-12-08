<?php

    require '../../model/modelo_vecino.php';

    $mec = new ModeloVecino();
    $consulta = $mec->listarMantenimientoVecino();
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