<div class="content-header">
  <div class="container-fluid">
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">CARGO MENSUAL A LOS VECINOS</h3>
      </div>
      <div class="card-body">
        <div class="text-right">
          <button type="button" class="btn btn-info px-5" onclick="abrirModal();">Registrar Cargo</button>
        </div>
        <table class="table table-bordered table-striped" id="tablaMantenimientoCargo">
          <thead>
            <tr>
              <th># Cargos</th>
              <th>Fecha</th>
              <th>Monto</th>
              <th>Descripcion</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>

          </tfoot>
        </table>



      </div>
    </div>
  </div>
</div>


<!-- INICIO MODAL -->
<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRAR UN CARGO MENSUAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-success" onclick="guardarCargo()" id="btnAgregar">APLICAR</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

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
        <form name="form_editar" id="form_editar" method="POST" style="background-color: rgba(163, 168, 172, 0.507); padding: 25px; border-radius: 10px;">
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
            <textarea class="form-control" name="descripcion" id="descripcionE" rows="3" maxlength="250"></textarea>
          </div>
        </form>
      </div>
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