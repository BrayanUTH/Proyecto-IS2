<?php
    require '../../model/modelo_reporte.php';
    $modeloReporte = new ModeloReporte();

    $opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : "";
    switch ($opcion) {
        case 'countVisitByMonth':
            $moduRept = new ModeloReporte();
            $moduRept2 = new ModeloReporte();
            $moduRept3 = new ModeloReporte();
            $arrayCantMesesVisitas = $modeloReporte->cantidadVisitasPorMes();
            $arrayDepositosPagados = $moduRept->depositoPagosVecindal();
            $arrayTotalPagosPorCargos = $moduRept2->totalPagosPorCargoMensual();
            $arrayConveniosByMonth = $moduRept3->conveniosPorMes();
            $arregloGeneral = array();

            array_push($arregloGeneral, $arrayCantMesesVisitas);
            array_push($arregloGeneral, $arrayDepositosPagados);
            array_push($arregloGeneral, $arrayTotalPagosPorCargos);
            array_push($arregloGeneral, $arrayConveniosByMonth);

            echo json_encode($arregloGeneral);
            break;
        default:
            # code...
            break;
    }
