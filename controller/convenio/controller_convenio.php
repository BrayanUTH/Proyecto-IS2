<?php
    require '../../model/modelo_convenio.php';
    $modeloConvenio = new ModeloConvenio();

    $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";
    switch ($opcion) {
        case 'listar':
            $consulta = $modeloConvenio->listarMantenimientoConvenio();
            
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
            $cargo = htmlspecialchars($_POST['cargo'], ENT_QUOTES, 'UTF-8');
            $monto = htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
            $prima= htmlspecialchars($_POST['prima'], ENT_QUOTES, 'UTF-8');
            $descuento = htmlspecialchars($_POST['descuento'], ENT_QUOTES, 'UTF-8');
            $saldo = htmlspecialchars($_POST['saldo'], ENT_QUOTES, 'UTF-8');
            $cuota = htmlspecialchars($_POST['cuota'], ENT_QUOTES, 'UTF-8');
            $detalle = htmlspecialchars($_POST['detalle'], ENT_QUOTES, 'UTF-8');
            $fechaultimo =htmlspecialchars($_POST['fechaultimo'], ENT_QUOTES, 'UTF-8');
            $estado =htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
            $vecino = htmlspecialchars($_POST['vecino'], ENT_QUOTES, 'UTF-8');

            $consulta = $modeloConvenio->registrarConvenio($cargo,$monto, $prima,$descuento,$saldo,$cuota,$detalle,$fechaultimo,$estado,$vecino);
            echo $consulta;
            break;
        case 'listarComboVecino':
            $consulta = $modeloDeposito->listarComboVecino();
            echo json_encode($consulta);
            break;
        case 'listarComboCargo':
            $consulta = $modeloConvenio->listarComboCargo();
            echo json_encode($consulta);
        break;
        case 'editar':
            $cargo = htmlspecialchars($_POST['cargo'], ENT_QUOTES, 'UTF-8');
            $monto = htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
            $prima= htmlspecialchars($_POST['prima'], ENT_QUOTES, 'UTF-8');
            $descuento = htmlspecialchars($_POST['descuento'], ENT_QUOTES, 'UTF-8');
            $saldo = htmlspecialchars($_POST['saldo'], ENT_QUOTES, 'UTF-8');
            $cuota = htmlspecialchars($_POST['cuota'], ENT_QUOTES, 'UTF-8');
            $detalle = htmlspecialchars($_POST['detalle'], ENT_QUOTES, 'UTF-8');
            $fechaultimo =htmlspecialchars($_POST['fechaultimo'], ENT_QUOTES, 'UTF-8');
            $estado =htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
            $idConvenio=htmlspecialchars($_POST['idConvenio'], ENT_QUOTES, 'UTF-8');
            $vecino = htmlspecialchars($_POST['vecino'], ENT_QUOTES, 'UTF-8');

            $consulta = $modeloDeposito->editarConvenio($idConvenio,$cargo,$monto, $prima,$descuento,$saldo,$cuota,$detalle,$fechaultimo,$estado,$vecino);
            echo $consulta;
            break;
        default:
            # code...
            break;
    }
