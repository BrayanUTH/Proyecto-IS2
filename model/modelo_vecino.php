<?php
    class ModeloVecino {
        private $conexion;

        function __construct() {
            require_once 'modelo_conexion.php';
            
            $this->conexion = new Conexion();
            $this->conexion->conectar();
        }

        function listarMantenimientoVecino() {
            $sql = "call SP_LISTAR_VECINOS()";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
            }
        }

        function listarEstatusGeneralVecino() {
            $sql = "SELECT * FROM resumen_saldos_vecinos order by SALDO DESC";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function registrarVecino($primerNombre, $segundoNombre, $primerApellido,$aegundoApellido,$fechaNacimiento,$telefonoR,$identidad, $numeroCasa, $numeroBloque,$vehiculo, $username, $password,$rolVecino) {
            try {
                $sql = "call SP_REGISTRAR_VECINO('$primerNombre', '$segundoNombre', 
                '$primerApellido','$aegundoApellido','$fechaNacimiento','$telefonoR',
                '$identidad', '$numeroCasa', '$numeroBloque','$vehiculo', '$username', 
                '$password','$rolVecino')"; 
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($consulta)) {
                        return trim($row[0]);   
                    }
                }
            } catch (Exception $e) {
                echo "<h3>ModeloVecino::registrarVecino() -> ".$e->getMessage()." </h3";
            } finally {
                $this->conexion->cerrar();
            }
        }

        function editarVecino($primerNombre, $segundoNombre, $primerApellido,$aegundoApellido,$fechaNacimiento,$telefonoR,$identidad, $numeroCasa, $numeroBloque,$vehiculo, $username, $password,$rolVecino, $txtIdVecino, $txtEstado) {
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
                echo "<h3>ModeloVecino::editarVecino() -> ".$e->getMessage()." </h3";
            } finally {
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
