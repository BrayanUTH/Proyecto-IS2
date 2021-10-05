<?php 

    include("databaseconnect.php");

    if(isset($_POST['registrar_deposito'])){

        $fecha = $_POST['fechaDep'];
        $monto = $_POST['monto'];
        $banco = $_POST['banco'];
        $nReferencia = $_POST['nReferencia'];
        $id_vecino = $_POST['idVecino'];
        $periodo = $_POST['fechaDep'];
        $debito = 0;
        $asentado = "SI";
        $nombreVecino = "";


        // Codigo para obtener nombre del vecino segun el ID seleccionado en el combobox
        $consulta = "SELECT Nombre FROM vecinos WHERE id_vecino = $id_vecino";       
        if ($resultado = mysqli_query($con,$consulta)) {

            /* obtener el array de objetos */
            while ($fila = mysqli_fetch_row($resultado)) {
               $nombreVecino = $fila[0];
            }

            /* liberar el conjunto de resultados */
            $resultado->close();
        }

        //Codigo para insertar datos ingresados a la tabla saldos_vecinos en mysql

        $query = "INSERT INTO saldos_vecinos (id_vecino, id_vecino_anterior, nombre_vecino, periodo, fecha, descripcion, debito, creditos, asentado) VALUES ($id_vecino, $id_vecino+1104100000, '$nombreVecino ', '$periodo', '$fecha',CONCAT('Deposito',' ','$banco',' ','Ref.','$nReferencia'),$debito,$monto,'$asentado');";
    
        $result = mysqli_query($con,$query);
        
        $queryb = "UPDATE vecinos SET Nombre = '$nombreVecino' WHERE id_vecino = $id_vecino";
        mysqli_query($con,$queryb);
       
        $queryc = "UPDATE saldos_vecinos SET nombre_vecino = '$nombreVecino' WHERE id_vecino = $id_vecino";
        mysqli_query($con,$queryc);
        
        
        if(!$result){
            die("Insercion de datos fallida. Regrese a la pagina anterior del navegador.");

        }else {
            echo'<script type="text/javascript">alert("Deposito Registrado!");window.location.href="inicio.php";
        </script>';
        
            //header("location:inicio.php");
        }
    }
?>