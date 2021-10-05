<?php
    class Conexion {
        private $servidor;
        private $usuario;
        private $contrasena;
        private $basedatos;
        public $conexion;

        public function __construct() {
            $this->servidor = "localhost";
            $this->usuario = "id12632217_admin";
            $this->contrasena = "~HQ-!(b*6MF27Vry";
            $this->basedatos = "residencial";
        }

        function conectar() {
            try {
                $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->basedatos);
                $this->conexion->set_charset("utf8");

            } catch (\Throwable $th) {
                echo 'Error en la conexion a la BDD </h2>'.$th->getMessage();
            }
        }

        function cerrar() {
            try {
                $this->conexion->close();

            } catch (\Throwable $th) {
                echo 'Error al cerrar la conexion a la BDD </h2>'.$th->getMessage();
            }
        }

    
    }
?>