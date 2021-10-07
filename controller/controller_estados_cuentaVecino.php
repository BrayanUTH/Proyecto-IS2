<?php

    require '../model/modelo_estado_cuenta.php';

    $mec = new ModeloEstadoCuenta();
    $id = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $consulta = $mec->listarEstadoCuentaVecino($id);
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