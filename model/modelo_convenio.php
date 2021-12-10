<?php
    class ModeloConvenio {
        private $conexion;

        function __construct() {
            require_once 'modelo_conexion.php';
            
            $this->conexion = new Conexion();
            $this->conexion->conectar();
        }

        function listarMantenimientoConvenio() {
            $sql = "call SP_LISTAR_CONVENIO()";          
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
            }
        }

        function listarComboCargo(){
            try {
                $sql = "call SP_LISTAR_COMBO_CARGO()";
                $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                        $arreglo[] = $consultaVu;
                    }

                    return $arreglo;
                }
            } catch (Exception $e) {
                echo "<h3>ModeloConvenio::listarComboCargo() -> " . $e->getMessage() . " </h3";
            } finally {
                $this->conexion->cerrar();
            }
    }


        function registrarConvenio($cargo,$monto, $prima,$descuento,$saldo,$cuota,$detalle,$fechaultimo,$estado,$vecino) {
            try {
                $sql = "call SP_REGISTRAR_CONVENIO('$cargo','$monto', '$prima','$descuento','$saldo','$cuota','$detalle','$fechaultimo','$estado','$vecino')"; 
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($consulta)) {
                        return trim($row[0]);   
                    }
                }
            } catch (Exception $e) {
                echo "<h3>ModeloConvenio::registrarConvenio() -> ".$e->getMessage()." </h3";
            } finally {
                $this->conexion->cerrar();
            }
        }

        function editarConvenio($idConvenio,$cargo,$monto, $prima,$descuento,$saldo,$cuota,$detalle,$fechaultimo,$estado,$vecino) {
            try {
                $sql = "call SP_EDITAR_CONVENIO('$idConvenio','$cargo','$monto', '$prima','$descuento','$saldo','$cuota','$detalle','$fechaultimo','$estado','$vecino')"; 
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($consulta)) {
                        return trim($row[0]);   
                    }
                }
            } catch (Exception $e) {
                echo "<h3>ModeloVecino::editarVecino() -> ".$e->getMessage()." </h3";
            } finally {
                $this->conexion->cerrar();
            }
        }

       

    }
