<?php
require '../../model/modelo_deposito.php';
$modeloDeposito = new ModeloDeposito();

$opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";
switch ($opcion) {
    case 'listar':
        $consulta = $modeloDeposito->listarMantenimientoDeposito();

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
    case 'registrar':
        $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
        $monto = htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
        $agencia = htmlspecialchars($_POST['agencia'], ENT_QUOTES, 'UTF-8');
        $numeroReferencia = htmlspecialchars($_POST['numeroReferencia'], ENT_QUOTES, 'UTF-8');
        $vecino = htmlspecialchars($_POST['vecino'], ENT_QUOTES, 'UTF-8');
        $cargo = htmlspecialchars($_POST['cargo'], ENT_QUOTES, 'UTF-8');

        $consulta = $modeloDeposito->registrarDeposito($fecha, $monto, $agencia, $numeroReferencia, $vecino, $cargo);
        echo $consulta;
        break;
    case 'listarComboVecino':
        $consulta = $modeloDeposito->listarComboVecino();
        echo json_encode($consulta);
        break;
    case 'listarComboCargo':
        $consulta = $modeloDeposito->listarComboCargo();
        echo json_encode($consulta);
        break;

    default:
        # code...
        break;
}
