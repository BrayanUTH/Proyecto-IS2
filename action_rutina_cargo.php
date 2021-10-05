<?php 

    include("databaseconnect.php");

    if(isset($_POST['rutina_cargo'])){

        $fecha = $_POST['fechaCargo'];
        $monto = $_POST['monto'];
        $descripcion = $_POST['descripcion'];
        $periodo = $_POST['fechaCargo'];
        $creditos = 0;
        $asentado = "SI";
        $nombreVecino = "";


        // Codigo para obtener nombre del vecino segun el ID seleccionado en el combobox
        

        //Codigo para insertar datos ingresados a la tabla saldos_vecinos en mysql
        for ($x=1;$x<=95;$x++){
            
            $consulta = "SELECT Nombre FROM vecinos WHERE id_vecino = $x";       
            if ($resultado = mysqli_query($con,$consulta)) {
    
                /* obtener el array de objetos */
                while ($fila = mysqli_fetch_row($resultado)) {
                   $nombreVecino = $fila[0];
                }
    
                /* liberar el conjunto de resultados */
                $resultado->close();
            }

        $query = "INSERT INTO saldos_vecinos (id_vecino, id_vecino_anterior, nombre_vecino, periodo, fecha, descripcion, debito, creditos, asentado) VALUES ($x, $x+1104100000, '$nombreVecino ', '$periodo', '$fecha','$descripcion',$monto,$creditos,'$asentado');";
        $result = mysqli_query($con,$query);
        
        $queryb = "UPDATE vecinos SET Nombre = '$nombreVecino' WHERE id_vecino = $x";
        mysqli_query($con,$queryb);
       
        $queryc = "UPDATE saldos_vecinos SET nombre_vecino = '$nombreVecino' WHERE id_vecino = $x";
        mysqli_query($con,$queryc);
    

        }    
        
    

        if(!$result){
            die("Insercion de datos fallida. Regrese a la pagina anterior del navegador.");

        }else {
            header("location:inicio.php");
        }
    }
?>