<?php

session_start();
$iduser = $_SESSION['idusuario'];

?>

<div class="content-header">

  <div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">ANUNCIAR VISITA - Apreciado vecino(a) debe enviar un registro por cada persona que le visita</h3>
    </div>
    <div class="card-body row justify-content-center">
      <div class="col-8 ">
        <form method="POST" id="form_visita" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
          <input type="hidden" name="txtidVecino" id="txtidVecino" value="<?php echo $iduser; ?>">
          <div class="form-group">
            <label>Primer nombre de la visita:</label>
            <input name="primerNombre" id="txtprimerNombre" class="form-control" placeholder="Primer nombre">
            </input>
          </div>

          <div class="form-group">
            <label>Segundo nombre de la visita:</label>
            <input name="segundoNombre" id="txtsegundoNombre" class="form-control" placeholder="Segundo nombre">
            </input>
          </div>

          <div class="form-group">
            <label>Primer apellido de la visita:</label>
            <input name="primerApellido" id="txtprimerApellido" class="form-control" placeholder="Primer apellido">
            </input>
          </div>

          <div class="form-group">
            <label>Segundo apellido de la visita:</label>
            <input name="segundoApellido" id="txtsegundoApellido" class="form-control" placeholder="Segundo apellido">
            </input>
          </div>

          <div class="form-group">
            <label> DNI:</label>
            <input name="txtCedula" id="txtCedula" class="form-control" placeholder="#### #### #####">
            </input>
          </div>
          <button type="button" class="btn btn-success px-5" onclick="guardarVisita();">Guardar</button>
        </form>
      </div>
    </div>

  </div>

</div>





<div class="content-header">
  <div class="container-fluid">
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">LISTADO DE VISITAS</h3>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#tab-2" data-toggle="tab"><i class="fa fa-user" style="font-size: 20px;"></i> VISITAS VECINOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="fas fa-address-book" style="font-size: 20px;"></i> MIS VISITAS</a>
          </li>
        </ul>

        <div class="tab-content border p-4">
          <div class="tab-pane fade show active" id="tab-2">
            <table class="table table-bordered table-striped" id="tablaMantenimientoVisita">
              <!-- <caption>DEPOSITOS VECINOS</caption> -->
              <thead>
                <tr>
                  <th>#</th>
                  <!-- <th># vicino</th> -->
                  <th>Fecha</th>
                  <th>Vecino</th>
                  <th>Nombre del visitante</th>
                  <th>DNI</th>
                  <th>Estado</th>
                  <th>Accion</th>

                </tr>
              </thead>
              <tbody>
                <!--Detalle de la tabla vecinos -->

              </tbody>
              <tfoot>

              </tfoot>
            </table>
          </div>
          <div class="tab-pane fade" id="tab-3">
            <table class="table table-bordered table-striped" id="tablaMantenimientoVisitaUsuario">
              <!-- <caption>DEPOSITOS VECINOS</caption> -->
              <thead>
                <tr>
                  <th>#</th>
                  <!-- <th># vicino</th> -->
                  <th>Fecha</th>
                  <th>Vecino</th>
                  <th>Nombre del visitante</th>
                  <th>DNI</th>
                  <th>Estado</th>
                  <th>Accion</th>

                </tr>
              </thead>
              <tbody>
                <!--Detalle de la tabla vecinos -->

              </tbody>
              <tfoot>

              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- INICIO MODAL -->
<div class="modal fade" id="modal_qr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLongTitle">Comparte este codigo</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Toca el codigo para descargar</p>
        <a href="" download id="a_qr">
          <img src="" class="img-fluid" alt="" id="img_qr">
        </a>


        <div class="modal-footer">
          <button type="button" class="btn color-dark-blue" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN MODAL -->

  <script src="js/visita.js?rev=<?php echo time(); ?>"></script>


  <script>
    $(document).ready(function() {
      listarMantenimientoVisita();
      listarMantenimientoVisitaUsuario();
    });
  </script>