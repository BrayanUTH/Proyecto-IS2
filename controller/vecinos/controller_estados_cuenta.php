<?php
    require '../../model/modelo_estado_cuenta.php';
    $modeloVecino = new ModeloEstadoCuenta();

    $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";

    switch ($opcion) {
        
        case 'listar':
             $fechaInicio  =  htmlspecialchars($_POST['fechaInicio'], ENT_QUOTES, 'UTF-8');
            $fechaFin =  htmlspecialchars($_POST['fechaFin'], ENT_QUOTES, 'UTF-8');
            $vecino =  htmlspecialchars($_POST['vecino'], ENT_QUOTES, 'UTF-8');

            $consulta = $modeloVecino->listarEstadoCuenta($vecino, $fechaInicio, $fechaFin);
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
            break;

        default:
            # code...
            break;
    }
?>