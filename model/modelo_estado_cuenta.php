<?php
    class ModeloEstadoCuenta {
        private $conexion;

        function __construct() {
            require_once 'modelo_conexion.php';
            
            $this->conexion = new Conexion();
            $this->conexion->conectar();
        }

        function listarEstadoCuenta($idVecino, $fechaInicio, $fechaFin) {
            $sql = "call SP_LISTAR_DETALLE_CUENTA('$idVecino', '$fechaInicio', '$fechaFin')";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
                $this->conexion->cerrar();
            }
        }
    }
?>