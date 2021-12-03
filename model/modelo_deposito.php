<?php
class ModeloDeposito
{
    private $conexion;

    function __construct()
    {
        require_once 'modelo_conexion.php';

        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }

    function listarMantenimientoDeposito()
    {
        try {
            $sql = "call SP_LISTAR_VECINOS()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloDeposito::editarVecino() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }

    function registrarDeposito($fecha, $monto, $agencia, $numeroReferencia, $vecino) {
        try {
            $sql = "call SP_REGISTRAR_DEPOSITO('$fecha', '$monto', '$agencia','$numeroReferencia','$vecino')";
            if ($this->conexion->conexion->query($sql)) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloDeposito::registrarVecino() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }

    function listarComboVecino()
    {
        try {
            $sql = "call SP_LISTAR_COMBO_VECINO()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo[] = $consultaVu;
                }

                return $arreglo;
            }
        } catch (Exception $e) {
            echo "<h3>ModeloDeposito::listarComboVecino() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }

    function editarVecino($primerNombre, $segundoNombre, $primerApellido, $aegundoApellido, $fechaNacimiento, $telefonoR, $identidad, $numeroCasa, $numeroBloque, $vehiculo, $username, $password, $rolVecino, $txtIdVecino, $txtEstado)
    {
        try {
            $sql = "call SP_EDITAR_VECINO('$txtIdVecino', '$primerNombre', '$segundoNombre', 
                '$primerApellido','$aegundoApellido','$fechaNacimiento','$telefonoR',
                '$identidad', '$numeroCasa', '$numeroBloque','$vehiculo', '$username', 
                '$password','$rolVecino', '$txtEstado')";
            if ($consulta = $this->conexion->conexion->query($sql)) {
                if ($row = mysqli_fetch_array($consulta)) {
                    return trim($row[0]);
                }
            }
        } catch (Exception $e) {
            echo "<h3>ModeloDeposito::editarVecino() -> " . $e->getMessage() . " </h3";
        } finally {
            $this->conexion->cerrar();
        }
    }
}
