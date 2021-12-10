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
            $sql = "call SP_MESES_MAS_VENTAS()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consultaVu;
                }

                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloProducto::obtenerMesesMasVentas() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }
}
