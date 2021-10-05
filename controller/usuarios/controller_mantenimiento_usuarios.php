<?php

    require '../../model/modelo_usuario.php';

    $mdUsuario = new ModeloUsuario();
    $consulta = $mdUsuario->listarUsuario();
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