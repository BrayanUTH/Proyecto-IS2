<?php
    require '../../model/modelo_deposito.php';
    $modeloDeposito = new ModeloDeposito();

    $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";
    switch ($opcion) {
        case 'listarVecino':
            // $consulta = $modeloDeposito->listarMantenimientoVecino();

            // if ($consulta) {
            //     echo json_encode($consulta);    
            // } else {
                
            //     echo '{
            //         "sEcho": 1, 
            //         "iTotalRecords": "0", 
            //         "ITotalDisplayRecords": "0", 
            //         "aaData": [] 
            //     }';
            // }
            break;
        case 'registrar':
            $fecha = htmlspecialchars($_POST['fecha'], ENT_QUOTES, 'UTF-8');
            $monto = htmlspecialchars($_POST['monto'], ENT_QUOTES, 'UTF-8');
            $agencia = htmlspecialchars($_POST['agencia'], ENT_QUOTES, 'UTF-8');
            $numeroReferencia = htmlspecialchars($_POST['numeroReferencia'], ENT_QUOTES, 'UTF-8');
            $vecino = htmlspecialchars($_POST['vecino'], ENT_QUOTES, 'UTF-8');

            $consulta = $modeloDeposito->registrarDeposito($fecha, $monto, $agencia,$numeroReferencia,$vecino);
            echo $consulta;
            break;
        case 'listarComboVecino':
            $consulta = $modeloDeposito->listarComboVecino();
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
