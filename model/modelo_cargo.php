<?php
class ModeloCargo
{
    private $conexion;

    function __construct()
    {
        require_once 'modelo_conexion.php';

        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }

    
      function guardarCargo($fecha, $monto, $descripcion){
        try {
                $sql = "call SP_REGISTRAR_CARGO('$fecha', '$monto', '$descripcion')";
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($consulta)) {
                        return trim($row[0]); //trim = quita los espacios   
                    }
                }
            } catch (Exception $e) {
                // echo "<h3>ModeloMarca::registrarMarca() -> ".$e->getMessage()."</h3";
            } finally {
                $this->conexion->cerrar();
            }  
    }

    function editarCargo($idCargo ,$fecha, $monto, $descripcion){
        try {
                $sql = "call SP_EDITAR_CARGO('$idCargo', '$fecha', '$monto', '$descripcion')";
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($consulta)) {
                        return trim($row[0]); //trim = quita los espacios   
                    }
                }
            } catch (Exception $e) {
                // echo "<h3>ModeloMarca::registrarMarca() -> ".$e->getMessage()."</h3";
            } finally {
                $this->conexion->cerrar();
            }  
    }

  

     function anularCargo($id)    {
        try {
                $sql = "call SP_ANULAR_CARGO('$id')";
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($consulta)) {
                        return trim($row[0]); //trim = quita los espacios   
                    }
                }
            } catch (Exception $e) {
                // echo "<h3>ModeloMarca::registrarMarca() -> ".$e->getMessage()."</h3";
            } finally {
                $this->conexion->cerrar();
            }  
    }

    function listarCargo(){
        $sql = "SELECT * FROM cargo_mensual";
        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                $arreglo["data"][] = $consultaVu;
            }

            return $arreglo;
            $this->conexion->cerrar();
        }
    }

     function listarCargoUsuarioNoPagado(){
        $sql = "SELECT * FROM cargo_mensual";
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