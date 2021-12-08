<?php
require_once('navbar_vigilancia.php');

include_once "model/modelo_conexion.php";

$cone = new Conexion();
$cone->conectar();
$con = $cone->conexion;

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $queryB = "SELECT * FROM visita WHERE id_visita = $id AND status_visita = 'INICIADO'";
  $resultB = mysqli_query($con, $queryB);
  $row = mysqli_fetch_array($resultB);


  if (mysqli_num_rows($resultB)) {

    $idV = $row['id_vecino'];
    $sql = "SELECT * FROM vecino WHERE id_vecino = $idV";
    $re = mysqli_query($con, $sql);
    $r = mysqli_fetch_array($re);

?>
    <div class="container ">

      <div class="alert alert-success" role="alert">
        <h3 class="text-center">Accesos a la residencial</h3>
        <p><b><?php echo 'Nombre del visitante: ' . $row['primer_nombre_visita'] . ' ' . $row['primer_apellido_visita']; ?></b></p>
        <!-- <p class="card-text"><?php echo 'Fecha de peticion: ' . $row['fecha']; ?></p> -->
        <p><b><?php echo 'Vecino al que visita: ' . $r['primer_nombre'] . ' ' . $r['primer_apellido']; ?></b></p>

        <p><b><?php echo 'Estado de la visita: :' . $row['status_visita']; ?></b></p>
        <?php
        if (isset($_POST['id_visita'])) {
          if ($_POST['id_visita'] != "") {

            $query = "UPDATE visita SET status_visita = 'INGRESO', fecha_visita = NOW() WHERE id_visita = $id";
            $result = mysqli_query($con, $query);
            echo '<h2 class="mt-3">Permiso concedido, permitir ingreso</h2>';
          }
        }
        ?>
      </div>
      <div class="container-sm px-5">
        <form method="post">
          <input type="hidden" name="id_visita" value="<?php echo $row['id_visita']; ?>">
          <button type="submit" class="btn btn-success btn-lg btn-block">PERMITIR INGRESO</button>
        </form>
      </div>

    </div>


  <?php
  } else { ?>

    <div class="container">
      <div class="alert alert-warning" role="alert">
        <p><b>Este codigo ya fue registrado o anulado.</b></p>
        <p><b>Pedir a la visita que llame al vecino para anunciarlo en vigilancia</b></p>
      </div>
    </div>

<?php  }
}
?>