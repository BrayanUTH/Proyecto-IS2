<?php 
  include ('databaseconnect.php');
  session_start();

  if (!isset($_SESSION['idusuario'])) {
    header("location: index.php");
  }

  $iduser = $_SESSION['idusuario'] ;

  $sql = "SELECT id_usuario, usuario, nombre, status FROM usuarios WHERE id_usuario = '$iduser'";
  $resultado = $con->query($sql);
  $row = $resultado->fetch_assoc();
?>

<div class="container">
        <br>
        <br>
    <table class="table table-striped" id="dataTable">
      <thead>
        <br>
        <h5>Status General por Vecinos</h5>
        <br>
          <button id="btnExportToCsv" type="button" class= "button">Exportar a CSV</button>
        <br>
        <br>
        <form action="" method="get">
          <input type="text" name="busqueda">
        
          <input type="submit" name="enviar" value=" Buscar:">
        </form>
        <!-- <script src="TableCSVExporter.js"></script> -->
        <script>
          var dataTable = document.getElementById("dataTable");

          var btnExportToCsv = document.getElementById("btnExportToCsv");

          btnExportToCsv.addEventListener("click", () =>{
              var exporter = new TableCSVExporter(dataTable);
              var csvOutPut = exporter.convertToCSV();
              var csvBlob = new Blob([csvOutPut], { type: "text/csv"});
              var blobUrl = URL.createObjectURL(csvBlob);

              var anchorElement = document.createElement("a");

              anchorElement.href = blobUrl;
              anchorElement.download = "vecinos.csv";
              anchorElement.click();

              setTimeout(() => {
                URL.revokeObjectURL(blobUrl);
              }, 500);

          });
 
        </script>
        <br>
        <br>
        <tr>
          <th scope="col">Vecino</th>
          <th scope="col">Cargos</th>
          <th scope="col">Pagos</th>
          <th scope="col">Saldo</th>
        </tr>
      </thead>
      <tbody>
      <!--Detalle de la tabla vecinos -->
        <?php

          if(isset($_GET['enviar'])){
              $var = $_GET['busqueda'];
              $query = "SELECT * FROM resumen_saldos_vecinos WHERE VECINO LIKE '%".$var."%'";
              $result_vecinos = mysqli_query($con,$query);
             while($row = mysqli_fetch_array($result_vecinos)){?>
          <tr>
            <td> <?php echo $row['VECINO'] ?></td>
            <td> <?php echo $row['DEBITO'] ?></td>
            <td> <?php echo $row['CREDITOS'] ?></td>
            <td> <?php echo $row['SALDO'] ?></td>
          
          </tr>
         <?php } 
          }else{
            $query = "SELECT * FROM resumen_saldos_vecinos order by SALDO DESC;";
            $result_vecinos = mysqli_query($con,$query);
      while($row = mysqli_fetch_array($result_vecinos)){ ?>
        <tr>
          <td> <?php echo $row['VECINO'] ?></td>
          <td> <?php echo $row['DEBITO'] ?></td>
          <td> <?php echo $row['CREDITOS'] ?></td>
          <td> <?php echo $row['SALDO'] ?></td>
        
        </tr>
         <?php } ?>
         <?php } ?>
      </tbody>
    </table>


        
</div>
