<?php
    class Conexion {
        private $servidor;
        private $usuario;
        private $contrasena;
        private $basedatos;
        public $conexion;

        public function __construct() {
            $this->servidor = "156.67.74.151";
            $this->usuario = "u357103333_user1";
            $this->contrasena = "Residencial97!";
            $this->basedatos = "u357103333_residencial";
        }

        function conectar() {
            try {
                $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->contrasena, $this->basedatos);
                $this->conexion->set_charset("utf8");

            } catch (\Throwable $th) {
                echo 'Error en la conexion a la BDD </h2>'.$th->getMessage();
            }
        }

        function cerrar() {
            try {
                mysqli_close($this->conexion);

            } catch (\Throwable $th) {
                echo 'Error al cerrar la conexion a la BDD </h2>'.$th->getMessage();
            }
        }

    
    }
?>