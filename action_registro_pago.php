<?php 

    include("databaseconnect.php");

    if(isset($_POST['registrar_pago'])){

        $fecha = $_POST['fechaPago'];
        $monto = $_POST['montoPago'];
        $tipoGasto = $_POST['tipoGasto'];
        $detalle = $_POST['detalle'];
        
        //Codigo para insertar datos ingresados a la tabla saldos_vecinos en mysql

        $query = "INSERT INTO cuentas (descripcion_cuentas, fecha_pago, detalle, monto) VALUES ('$tipoGasto', '$fecha','$detalle',$monto);";
    
        $result = mysqli_query($con,$query);
        
        if(!$result){
            die("Insercion de datos fallida. Regrese a la pagina anterior del navegador.");

        }else {
            
            header("location:cuentas_a_pagar.php");
        }
    }
?>