<?php
    class ModeloTransacciones {
        private $conexion;

        function __construct() {
            require_once 'modelo_conexion.php';
            
            $this->conexion = new Conexion();
            $this->conexion->conectar();
        }

        function listarTransacciones() {
            $sql = "SELECT * FROM saldos_vecinos WHERE creditos > 0 ORDER BY id_transaccion DESC LIMIT 30";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function modificarTransaccion($idTransaccion, $idVecino, $idAnterior, $nombre, $periodo,$fecha, $debito, $credito, $asentado, $descripcion) {
            $sql = "UPDATE saldos_vecinos SET
            id_vecino = '$idVecino' , 
            id_vecino_anterior = '$idAnterior' , 
            nombre_vecino = '$nombre', 
            periodo='$periodo', 
            fecha =  '$fecha', 
            descripcion = '$descripcion', 
            debito = '$debito', 
            creditos = '$credito', 
            asentado = '$asentado' 
            WHERE id_transaccion = '$idTransaccion' ";
            if ($this->conexion->conexion->query($sql)) {
                return 1;
            }else {
                return 0;
            }
            $this->conexion->cerrar();
        }

        function eliminarTransaccion($idTransaccion) {
            $sql = "DELETE FROM saldos_vecinos WHERE id_transaccion = '$idTransaccion' ";
            if ($this->conexion->conexion->query($sql)) {
                return 1;
            }else {
                return 0;
            }
            $this->conexion->cerrar();
        }

    }
