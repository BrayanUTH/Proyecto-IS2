<?php
session_start();

if (!isset($_SESSION['idusuario'])) {
  header("location: index.php");
}
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header bg-secondary">
        <h3 class="card-title">Mantenimiento informacion vecinos</h3>
      </div>
      <div class="card-body">
        <div class="text-right">
          <button type="button" class="btn btn-info" onclick="abrirModal();">Registrar Vecino</button>
        </div>
        <table class="table table-bordered table-striped" id="tablaMantenimientoVecino">
          <thead>
            <tr>
              <th>Id vecino</th>
              <th>Nombre</th>
              <th>Casa</th>
              <th>Bloque</th>
              <th>Vehiculos</th>
              <th>Id Anterior</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <!--Detalle de la tabla vecinos -->

          </tbody>
          <tfoot>
            <tr>
              <th>Id vecino</th>
              <th>Nombre</th>
              <th>Casa</th>
              <th>Bloque</th>
              <th>Vehiculos</th>
              <th>Id Anterior</th>
              <th>Accion</th>
            </tr>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Registrar Vecino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 mb-3">
            <label for="">Nombres</label>
            <input type="text" class="form-control" id="txtNombreR" placeholder="Ingrese los nombres del vecino">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Apellidos</label>
            <input type="text" class="form-control" id="txtApellidosR" placeholder="Ingrese los apellidos del vecino">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Numero de Telefono</label>
            <input type="text" class="form-control" id="txtTelefonoR" placeholder="Tel Ej: +504 0000-0000">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Correo Electronico</label>
            <input type="email" class="form-control" id="txtCorreoR" placeholder="Correo Ej: correo@correo.com">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Cedula - Identidad</label>
            <input type="email" class="form-control" id="txtIdentidad" placeholder="Ingrese el numero de identidad, sin separaciones ni guiones">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Numero de casa</label>
            <input type="text" class="form-control" id="txtNumeroCasa" placeholder="Ingrese el numero de casa">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Numero de bloque</label>
            <input type="text" class="form-control" id="txtNumeroBloque" placeholder="Ingrese el numero de bloque">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Cantidad de Vehiculos</label>
            <input type="number" min="0" name="vehiculos" id="txtVehiculo" class="form-control" placeholder="Qty. Vehiculos">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Username</label>
            <input type="text" class="form-control" id="txtNumeroBloque" placeholder="Ingrese el username para la persona">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Password</label>
            <input type="password" name="vehiculos" id="txtVehiculo" class="form-control" placeholder="*******************">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Rol</label>
            <select class="form-control" id="txtRolVecino">
              <option value="Administrador">Administrador</option>
              <option value="Vecino">Vecino</option>
              <option value="Vigilante">Vigilante</option>
            </select>
          </div>
          <div class="col-lg-12">
            <label for="">Fotografia</label>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="validatedCustomFile" required>
              <label class="custom-file-label" for="validatedCustomFile">Ingresar Fotografia</label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar Vecino</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<!-- INICIO MODAL -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de vecino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-lg-6 mb-3">
            <label for="">Nombres</label>
            <input type="text" class="form-control" id="txtNombreR" placeholder="Ingrese los nombres del vecino">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Apellidos</label>
            <input type="text" class="form-control" id="txtApellidosR" placeholder="Ingrese los apellidos del vecino">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Numero de Telefono</label>
            <input type="text" class="form-control" id="txtTelefonoR" placeholder="Tel Ej: +504 0000-0000">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Correo Electronico</label>
            <input type="email" class="form-control" id="txtCorreoR" placeholder="Correo Ej: correo@correo.com">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Cedula - Identidad</label>
            <input type="email" class="form-control" id="txtIdentidad" placeholder="Ingrese el numero de identidad, sin separaciones ni guiones">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Numero de casa</label>
            <input type="text" class="form-control" id="txtNumeroCasa" placeholder="Ingrese el numero de casa">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Numero de bloque</label>
            <input type="text" class="form-control" id="txtNumeroBloque" placeholder="Ingrese el numero de bloque">
          </div>
          <div class="col-lg-6 mb-3">
            <label for="">Cantidad de Vehiculos</label>
            <input type="number" min="0" name="vehiculos" id="txtVehiculo" class="form-control" placeholder="Qty. Vehiculos">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Username</label>
            <input type="text" class="form-control" id="txtNumeroBloque" placeholder="Ingrese el username para la persona">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Password</label>
            <input type="password" name="vehiculos" id="txtVehiculo" class="form-control" placeholder="*******************">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="">Rol</label>
            <select class="form-control" id="txtRolVecino">
              <option value="Administrador">Administrador</option>
              <option value="Vecino">Vecino</option>
              <option value="Vigilante">Vigilante</option>
            </select>
          </div>
          <div class="col-lg-12">
            <label for="">Fotografia</label>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="validatedCustomFile" required>
              <label class="custom-file-label" for="validatedCustomFile">Ingresar Fotografia</label>
            </div>
          </div>
        </div>

        <!-- <div class="col-lg-12">
          <input type="text" id="txtIdVecino" hidden>
          <label for="">Nombre</label>
          <input type="text" class="form-control" id="txtNombre" placeholder="Ingrese su nombre">
        </div>
        <div class="col-lg-12">
          <label for="">Numero de casa</label>
          <input type="text" class="form-control" id="txtNumeroCasa" placeholder="Ingrese el numero de casa">
        </div>
        <div class="col-lg-12">
          <label for="">Numero de bloque</label>
          <input type="text" class="form-control" id="txtNumeroBloque" placeholder="Ingrese el numero de bloque">
        </div>
        <div class="col-lg-12">
          <label for="">Cantidad de Vehiculos</label>
          <input type="text" name="vehiculos" id="txtVehiculo" class="form-control" placeholder="Qty. Vehiculos">
        </div> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editarInformacionVecino()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<script src="js/vecino.js?rev=<?php echo time(); ?>"></script>
<script>
  $(document).ready(function() {
    listarMantenimientoVecino();
  });
</script>