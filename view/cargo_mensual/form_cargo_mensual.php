<div class="content-header">

  <div class="container p-4">
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">CARGO MENSUAL A LOS VECINOS</h3>
      </div>
      <div class="card-body">
        <form class="form-horizontal" id="form_cargo" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fecha del cargo:</label>
              <div class="col-sm-10">
                <input type="date" name="fechaCargo" id="fechaCargo" class="form-control">
              </div>

            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Monto del cargo:</label>
              <div class="col-sm-10">
                <input type="text" name="montoCargo" id="montoCargo" class="form-control" placeholder="Monto del Cargo">
              </div>

            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Descripcion:</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" maxlength="250"></textarea>
              </div>

            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
              <button type="button" class="btn btn-success btn-block" onclick="guardarCargo()">Aplicar </button>
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>



</div>


<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header color-dark-blue">
        <h3 class="card-title">Mantenimiento informacion cargos</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaMantenimientoCargo">
          <!-- <caption>DEPOSITOS VECINOS</caption> -->
          <thead>
            <tr>
              <th># Cargos</th>
              <!-- <th># vicino</th> -->
              <th>Fecha</th>
              <th>Monto</th>
              <th>Descripcion</th>
              <th>Estado</th>
              <th>Acciones</th>


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

<!-- INICIO MODAL  modal para editar el deposito-->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form_editar" id="form_editar" method="POST">
          <input type="text" name="txtIdCargo" id="txtIdCargoE" class="form-control" hidden>
          <div class="form-group">
            <label>Fecha del cargo:</label>
            <input type="date" name="fechaCargo" id="fechaCargoE" class="form-control">
          </div>
          <div class="form-group">
            <label>Monto del cargo:</label>
            <input type="text" name="montoCargo" id="montoCargoE" class="form-control" placeholder="Monto del Cargo">
          </div>
          <div class="form-group">
            <label>Descripcion:</label>
            <!-- <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" > -->
            <textarea class="form-control" name="descripcion" id="descripcionE" rows="3" maxlength="250"></textarea>
          </div>
        </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="editarCargo()">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN MODAL -->


  <script src="js/cargo_mensual.js?rev=<?php echo time(); ?>"></script>

  <script>
    $(document).ready(function() {
      listarMantenimientoCargo();
    });
  </script>