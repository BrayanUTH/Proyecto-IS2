<?php
    require '../../model/modelo_reporte.php';
    $modeloReporte = new ModeloReporte();

    $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";
    switch ($opcion) {
        case 'countVisitByMonth':
            $arrayCantMesesVisitas = $modeloReporte->cantidadVisitasPorMes();
            $arregloGeneral = array();

            array_push($arregloGeneral, $arrayCantMesesVisitas);

            echo json_encode($arregloGeneral);
            break;
        default:
            # code...
            break;
    }
