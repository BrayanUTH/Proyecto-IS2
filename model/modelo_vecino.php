<?php
    class ModeloVecino {
        private $conexion;

        function __construct() {
            require_once 'modelo_conexion.php';
            
            $this->conexion = new Conexion();
            $this->conexion->conectar();
        }

        function listarMantenimientoVecino() {
            $sql = "SELECT * FROM vecinos";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function modificarVecino($id, $nombre, $casa, $bloque, $vehiculo) {
            $sql = "UPDATE vecinos SET Nombre = '$nombre', Casa = '$casa', Bloque = '$bloque', vehiculos='$vehiculo' WHERE id_vecino = '$id' ";
            if ($this->conexion->conexion->query($sql)) {
                $sql2 = "UPDATE saldos_vecinos SET nombre_vecino = '$nombre' WHERE id_vecino = $id";
                if ($this->conexion->conexion->query($sql2)) {
                    return 1;
                }
            }else {
                return 0;
            }
            $this->conexion->cerrar();
        }

    }
