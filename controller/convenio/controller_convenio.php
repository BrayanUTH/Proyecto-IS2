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
            $monto = htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
            $prima= htmlspecialchars($_POST['prima'], ENT_QUOTES, 'UTF-8');
            $descuento = htmlspecialchars($_POST['descuento'], ENT_QUOTES, 'UTF-8');
            $saldo = htmlspecialchars($_POST['saldo'], ENT_QUOTES, 'UTF-8');
            $cuota = htmlspecialchars($_POST['cuota'], ENT_QUOTES, 'UTF-8');
            $detalle = htmlspecialchars($_POST['detalle'], ENT_QUOTES, 'UTF-8');
            $fechaultimo =htmlspecialchars($_POST['fechaultimo'], ENT_QUOTES, 'UTF-8');
            $vecino = htmlspecialchars($_POST['vecino'], ENT_QUOTES, 'UTF-8');

            $consulta = $modeloConvenio->registrarConvenio($monto, $prima,$descuento,$saldo,$cuota,$detalle,$fechaultimo,$vecino);
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
        case 'editarVecino':
            $primerNombre = htmlspecialchars($_POST['primerNombre'], ENT_QUOTES, 'UTF-8');
            $segundoNombre = htmlspecialchars($_POST['segundoNombre'], ENT_QUOTES, 'UTF-8');
            $primerApellido = htmlspecialchars($_POST['primerApellido'], ENT_QUOTES, 'UTF-8');
            $aegundoApellido = htmlspecialchars($_POST['aegundoApellido'], ENT_QUOTES, 'UTF-8');
            $fechaNacimiento = htmlspecialchars($_POST['fechaNacimiento'], ENT_QUOTES, 'UTF-8');
            $telefonoR = htmlspecialchars($_POST['telefonoR'], ENT_QUOTES, 'UTF-8');
            $identidad = htmlspecialchars($_POST['identidad'], ENT_QUOTES, 'UTF-8');
            $numeroCasa = htmlspecialchars($_POST['numeroCasa'], ENT_QUOTES, 'UTF-8');
            $numeroBloque = htmlspecialchars($_POST['numeroBloque'], ENT_QUOTES, 'UTF-8');
            $vehiculo = htmlspecialchars($_POST['vehiculo'], ENT_QUOTES, 'UTF-8');
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
            $rolVecino = htmlspecialchars($_POST['rolVecino'], ENT_QUOTES, 'UTF-8');
            $txtIdVecino = htmlspecialchars($_POST['txtIdVecino'], ENT_QUOTES, 'UTF-8');
            $txtEstado = htmlspecialchars($_POST['txtEstado'], ENT_QUOTES, 'UTF-8');

            $consulta = $modeloDeposito->editarVecino($primerNombre, $segundoNombre, $primerApellido,$aegundoApellido,$fechaNacimiento,$telefonoR,$identidad, 
            $numeroCasa, $numeroBloque,$vehiculo, $username, $password,$rolVecino,$txtIdVecino, $txtEstado);
            echo $consulta;
            break;
        default:
            # code...
            break;
    }
