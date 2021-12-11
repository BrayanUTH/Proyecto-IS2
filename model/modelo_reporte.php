<?php
class ModeloReporte
{
    private $conexion;

    function __construct()
    {
        require_once 'modelo_conexion.php';

        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }


    function cantidadVisitasPorMes()
    {
        try {
            $sql = "call SP_CANTIDAD_VISITAS_POR_MES()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consultaVu;
                }

                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloProducto::cantidadVisitasPorMes() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }

    function depositoPagosVecindal()
    {
        try {
            $sql = "SELECT cm.descripcion_cargo, v.id_vecino,  d.id_deposito,
            IF(cm.descripcion_cargo IS NOT NULL,'PAGADO','NO PAGADO') as estado
            FROM vecino v LEFT JOIN deposito d ON v.id_vecino = d.id_vecino
            LEFT JOIN cargo_mensual cm ON cm.id_cargo = d.id_cargo";
            $arreglo = array();
            $contadorPago = 0;
            $porcentajePagados = 0.00;

            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    if ($consultaVu['estado'] == 'PAGADO') {
                        $contadorPago++;
                    }
                }
                $porcentajePagados = ($contadorPago / 100) * 100;
                array_push($arreglo, $porcentajePagados);
                array_push($arreglo, (100 - $porcentajePagados));
                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloProducto::cantidadVisitasPorMes() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }

    function totalPagosPorCargoMensual()
    {
        try {
            $sql = "SELECT cm.descripcion_cargo, SUM(d.monto) as total
            FROM vecino v INNER JOIN deposito d ON v.id_vecino = d.id_vecino
            INNER JOIN cargo_mensual cm ON cm.id_cargo = d.id_cargo
            GROUP BY cm.descripcion_cargo
            ORDER BY total DESC";

            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consultaVu;
                }
                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloProducto::totalPagosPorCargoMensual() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }

    function conveniosPorMes()
    {
        try {
            $sql = "SELECT MONTHNAME(fecha_inicio) NOMBRE_MES, COUNT(id_convenio) CANTIDAD
                    FROM convenio 
                WHERE YEAR(fecha_inicio) = YEAR(CURDATE())
                GROUP BY NOMBRE_MES";

            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consultaVu;
                }
                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloProducto::conveniosPorMes() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }
    function vecinoMayorVisitas()
    {
        try {
            $sql = "call SP_VECINO_MAYORES_VISITAS()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consultaVu;
                }

                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloProducto::vecinoMayorVisitas() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }

    function vecinoMenorVisitas()
    {
        try {
            $sql = "call SP_VECINO_MENORES_VISITAS()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consultaVu;
                }

                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>modelo_reporte::vecinoMenorVisitas()-> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }
}
