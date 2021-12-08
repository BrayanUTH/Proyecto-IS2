<?php
session_start();
require '../../model/modelo_visita.php';


$mec = new ModeloVisita();

$accion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";



switch ($accion) {
    case 'registrar':
        $idVecino = htmlspecialchars($_POST['idVecino'], ENT_QUOTES, 'UTF-8');
        $primerNombre  = htmlspecialchars($_POST['primerNombre'], ENT_QUOTES, 'UTF-8');
        $segundoNombre  = htmlspecialchars($_POST['segundoNombre'], ENT_QUOTES, 'UTF-8');
        $primerApellido  = htmlspecialchars($_POST['primerApellido'], ENT_QUOTES, 'UTF-8');
        $segundoApellido  = htmlspecialchars($_POST['segundoApellido'], ENT_QUOTES, 'UTF-8');
        $dni = htmlspecialchars($_POST['cedula'], ENT_QUOTES, 'UTF-8');

        $consulta = $mec->guardarVisita($idVecino, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $dni);
        echo $consulta;

        // echo 44;
        break;

    case 'imprimir':

        $idVecino = htmlspecialchars($_POST['idVecino'], ENT_QUOTES, 'UTF-8');
        $idVisita = htmlspecialchars($_POST['idVisita'], ENT_QUOTES, 'UTF-8');

        $consulta = $mec->imprimirVisita($idVisita, $idVecino);
        echo $consulta;
        break;

    case 'anular':

        // $idVecino= htmlspecialchars($_POST['idVecino'], ENT_QUOTES, 'UTF-8');
        $idVisita = htmlspecialchars($_POST['idVisita'], ENT_QUOTES, 'UTF-8');

        $consulta = $mec->anularVisita($idVisita);
        echo $consulta;
        break;


    case 'listar':
        $consulta = $mec->listarVisita();
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


    case 'listarUsuario':
        $idVecino = $_SESSION['idusuario'];

        $consulta = $mec->listarVisitaUsuario($idVecino);
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
        break;
}
