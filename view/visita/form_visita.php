<?php

session_start();
$iduser = $_SESSION['idusuario'];

?>

<div class="content-header">

    <div class="card">
        <div class="card-header color-dark-blue text-light card-title">
            <p> Anunciar una visita</p>
            <small>Apreciado vecino(a) debe enviar un registro por cada persona que le visita</small>
        </div>
        <div class="card-body row justify-content-center">
            <div class="col-8 ">
                <form method="POST" id="form_visita">
                    <input type="hidden" name="txtidVecino" id="txtidVecino" value="<?php echo $iduser;?>">
                    <div class="form-group">
                        <label>Primer nombre de la visita:</label>
                        <input name="primerNombre" id="txtprimerNombre" class="form-control" placeholder="Primer nombre" >
                        </input>
                    </div>

                    <div class="form-group">
                        <label>Segundo nombre de la visita:</label>
                        <input name="segundoNombre" id="txtsegundoNombre" class="form-control" placeholder="Segundo nombre" >
                        </input>
                    </div>

                    <div class="form-group">
                        <label>Primer apellido de la visita:</label>
                        <input name="primerApellido" id="txtprimerApellido" class="form-control" placeholder="Primer apellido" >
                        </input>
                    </div>

                    <div class="form-group">
                        <label>Segundo apellido de la visita:</label>
                        <input name="segundoApellido" id="txtsegundoApellido" class="form-control" placeholder="Segundo apellido" >
                        </input>
                    </div>

                    <div class="form-group">
                        <label> DNI:</label>
                        <input name="txtCedula" id="txtCedula" class="form-control" placeholder="#### #### #####" >
                        </input>
                    </div>
                    <button type="button" class="btn color-dark-blue" onclick="guardarVisita();">Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>



<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header color-dark-blue">
        <h3 class="card-title">Mantenimiento visitas de los vecinos</h3>
      </div>
      <div class="card-body">
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
    </div>
  </div>
</div>

<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header color-dark-blue">
        <h3 class="card-title">Mis visitas</h3>
      </div>
      <div class="card-body">
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
 