<?php 

    include("databaseconnect.php");

    if(isset($_POST['registrar_convenio'])){

        $fecha = $_POST['fechaCon'];
        $monto = $_POST['montoCon'];
        $prima = $_POST['prima'];
        $descuento = $_POST['descuento'];
        $saldo = $_POST['saldo'];
        $cuotas = $_POST['cuotas'];
        $detalle = $_POST['detalle'];
        $id_vecino = $_POST['idVecino'];
        $fechaFin = $_POST['fechaFin'];
        $status = "ACTIVO";
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

        $query = "INSERT INTO arreglos_de_pago (id_vecino, fecha_arreglo, nombre_vecino, saldo, prima, cuotas_plazo, descuentos, saldo_restante, descripcion_arreglo, fecha_fin, status ) VALUES ($id_vecino,'$fecha','$nombreVecino ', $monto, $prima, $cuotas, $descuento,$saldo, '$detalle', '$fechaFin', '$status');";
    
        $result = mysqli_query($con,$query);
        
        if(!$result){
            die("Insercion de datos fallida. Regrese a la pagina anterior del navegador.");

        }else {
            header("location:arreglos_pago.php");
        }
    }
?>