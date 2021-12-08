<?php
class ModeloPago
{
    private $conexion;

    function __construct()
    {
        require_once 'modelo_conexion.php';

        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }
    
    function guardarPago($fecha, $monto, $tipo, $descripcion){
        try {
                $sql = "call SP_REGISTRAR_PAGO('$fecha', '$monto', '$tipo', '$descripcion')";
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

      function modificarPago($id, $fecha, $monto, $tipo, $descripcion)
    {
        try {
                $sql = "call SP_EDITAR_PAGO('$id' , '$fecha', '$monto', '$tipo', '$descripcion')";
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

    function listarPago(){
        $sql = "SELECT * FROM pago";
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