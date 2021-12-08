<?php
    require '../../model/modelo_pago.php';

    $modelo = new ModeloPago();

    $accion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";

 
    $fecha  =  $_POST['fecha'];
    $monto  =  htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
    $tipo =  htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');
    $descripcion =  htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');
  
    switch ($accion) {
        case 'guardar':
            $consulta = $modelo->guardarPago($fecha, $monto, $tipo, $descripcion);
            echo $consulta;
        break;

        case 'editar':

            $id = $_POST['idPago'];

            $consulta = $modelo->modificarPago($id, $fecha, $monto, $tipo, $descripcion);
            echo $consulta;
        break;


        case 'listar':
            $id = $_POST['id'];
            $consulta = $modelo->modificarPago($id, $fecha, $monto, $tipo, $descripcion);
            echo $consulta;
        break;
        
        default:
            # code...
            break;
    }
