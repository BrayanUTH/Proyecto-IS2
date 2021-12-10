<?php
    class Conexion {
        private $servidor;
        private $usuario;
        private $contrasena;
        private $basedatos;
        public $conexion;

        public function __construct() {
            $this->servidor = "localhost";
            $this->usuario = "root";
            $this->contrasena = "";
            $this->basedatos = "residencial";
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