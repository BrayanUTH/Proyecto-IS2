<?php
require '../../model/modelo_cargo.php';

$modelo = new ModeloCargo();

$accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : "";


switch ($accion) {
    case 'guardar':
        $fecha  =  $_POST['fecha'];
        $monto  =  htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
        $descripcion =  htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');
        $consulta = $modelo->guardarCargo($fecha, $monto, $descripcion);
        echo $consulta;
        break;

    case 'editar':

        $id  =  $_POST['idCargo'];
        $fecha  =  $_POST['fecha'];
        $monto  =  htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
        $descripcion =  htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');
        $consulta = $modelo->editarCargo($id, $fecha, $monto, $descripcion);
        echo $consulta;
        break;


    case 'anular':

        // $idVecino= htmlspecialchars($_POST['idVecino'], ENT_QUOTES, 'UTF-8');
        $idCargo = htmlspecialchars($_POST['idCargo'], ENT_QUOTES, 'UTF-8');

        $consulta = $modelo->anularCargo($idCargo);
        echo $consulta;
        break;

    case 'listar':
        $consulta = $modelo->listarCargo();
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

    // echo $_POST['accion'];
