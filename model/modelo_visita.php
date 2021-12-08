<?php


require_once '../../phpqrcode/qrlib.php';

class ModeloVisita{
    private $conexion;
    
    function __construct()
    {
        require_once 'modelo_conexion.php';
        

        $this->conexion = new Conexion();
        $this->conexion->conectar();
    }


    function guardarVisita($idVecino, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $dni) {   

          $sql = "call SP_REGISTRAR_VISITA('$idVecino', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$dni')";
          $result = mysqli_query($this->conexion->conexion, $sql);

        if ($result) {
            $sqlB = "SELECT * FROM visita  WHERE id_vecino = '$idVecino' order by id_visita DESC";
            $resultB = $this->conexion->conexion->query($sqlB);
            $fila = $resultB->fetch_assoc();

       
              $dir = '../../temp/';

            if(!file_exists($dir)) mkdir($dir);

            $filename = $dir.'img_'.$idVecino.'.png';

            $size = 10;
            $level = 'H';
            $framesize = 1;
            $contenido = 'http://localhost/residencial//action_permitir_ingreso.php?id='.$fila['id_visita'];

            QRcode::png($contenido,$filename,$level,$size, $framesize);

            return 1;
        } else {
            return 0;
        }

        return 0;
        $this->conexion->cerrar();
    }

    function imprimirVisita($idVisita, $idVecino) {   

            try {
                  $dir = '../../temp/';

                    if(!file_exists($dir)) mkdir($dir);

                    $filename = $dir.'img_'.$idVecino.'.png';

                    $size = 10;
                    $level = 'H';
                    $framesize = 1;
                    $contenido = 'http://localhost/residencial//action_permitir_ingreso.php?id='.$idVisita;

                    QRcode::png($contenido,$filename,$level,$size, $framesize);
                    return 1;
            } catch (\Throwable $th) {
                return 0 ;
            }
    }

    function anularVisita($id)    {
        try {
                $sql = "call SP_ANULAR_VISITA('$id')";
                if ($consulta = $this->conexion->conexion->query($sql)) {
                    if ($row = mysqli_fetch_array($consulta)) {
                        return trim($row[0]); //trim = quita los espacios   
                    }
                }
            } catch (Exception $e) {
            } finally {
                $this->conexion->cerrar();
            }  
    }

    function listarVisita(){
        $sql = "SELECT 
                        CONCAT_WS(' ', vecino.primer_nombre, vecino.segundo_nombre, vecino.primer_apellido, vecino.segundo_apellido) AS nombre_vecino,
                        CONCAT_WS(' ', visita.primer_nombre_visita, visita.segundo_nombre_visita, visita.primer_apellido_visita, visita.segundo_apellido_visita) AS nombre_visitante,
                        visita.dni_visita,
                        visita.fecha_visita,
                        visita.status_visita,
                        visita.id_visita,
                        visita.id_vecino
                    FROM visita INNER JOIN vecino ON visita.id_vecino = vecino.id_vecino
                    ";
        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consultaVu = mysqli_fetch_assoc($consulta)) {
                $arreglo["data"][] = $consultaVu;
            }

            return $arreglo;
            $this->conexion->cerrar();
        }
    }


     function listarVisitaUsuario($id){
        $sql = "SELECT 
                        CONCAT_WS(' ', vecino.primer_nombre, vecino.segundo_nombre, vecino.primer_apellido, vecino.segundo_apellido) AS nombre_vecino,
                        CONCAT_WS(' ', visita.primer_nombre_visita, visita.segundo_nombre_visita, visita.primer_apellido_visita, visita.segundo_apellido_visita) AS nombre_visitante,
                        visita.dni_visita,
                        visita.fecha_visita,
                        visita.status_visita,
                        visita.id_visita,
                        visita.id_vecino
                    FROM visita INNER JOIN vecino ON visita.id_vecino = vecino.id_vecino
                    WHERE visita.id_vecino = $id
                    ";
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