<?php
    class ModeloUsuario {
        private $conexion;

        function __construct() {
            require_once 'modelo_conexion.php';
            
            $this->conexion = new Conexion();
            $this->conexion->conectar();
        }

        function listarUsuario() {
            $sql = "SELECT * FROM usuarios";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][] = $consultaVu;
                }

                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        function modificarUsuario($id, $username, $password) {
            $sql = "UPDATE usuarios SET usuario = '$username', password = '$password'WHERE id_usuario = '$id' ";
            if ($this->conexion->conexion->query($sql)) {
                return 1;
            }else {
                return 0;
            }
            $this->conexion->cerrar();
        }

    }
