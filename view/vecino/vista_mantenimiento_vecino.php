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
              <th>#</th>
              <th>Nombre</th>
              <th>DNI</th>
              <th>F Nacimiento</th>
              <th>Telefono</th>
              <th>Casa</th>
              <th>Bloque</th>
              <th>Vehiculos</th>
              <th>Username</th>
              <th>Password</th>
              <th>Estado</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <!--Detalle de la tabla vecinos -->

          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>DNI</th>
              <th>F Nacimiento</th>
              <th>Telefono</th>
              <th>Casa</th>
              <th>Bloque</th>
              <th>Vehiculos</th>
              <th>Username</th>
              <th>Password</th>
              <th>Estado</th>
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
        <form action="" id="frmRegistrarVecino">
          <div class="row">
            <div class="col-lg-6 mb-3">
              <label for="">Primer Nombre</label>
              <input type="text" class="form-control" id="txtPrimerNombre" placeholder="Ingrese el primer nombre del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Segundo Nombre</label>
              <input type="text" class="form-control" id="txtSegundoNombre" placeholder="Ingrese el segundo nombre del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Primer Apellido</label>
              <input type="text" class="form-control" id="txtPrimerApellido" placeholder="Ingrese el primer apellido del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Segundo Apellido</label>
              <input type="text" class="form-control" id="txtSegundoApellido" placeholder="Ingrese el segundo apellido del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Fecha Nacimiento</label>
              <input type="date" class="form-control" id="txtFechaNacimiento" placeholder="Ingrese la fecha de nacimiento del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Numero de Telefono</label>
              <input type="text" class="form-control" id="txtTelefonoR" placeholder="Tel Ej: +504 0000-0000">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Cedula - Identidad</label>
              <input type="text" class="form-control" id="txtIdentidad" placeholder="Ingrese el numero de identidad, sin separaciones ni guiones">
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
              <input type="text" class="form-control" id="txtUsername" placeholder="Ingrese el username para la persona">
            </div>
            <div class="col-lg-4 mb-3">
              <label for="">Password</label>
              <input type="password" name="vehiculos" id="txtPassword" class="form-control" placeholder="*******************">
            </div>
            <div class="col-lg-4 mb-3">
              <label for="">Tipo Usuario</label>
              <select class="form-control" id="txtRolVecino">
                <option value="ADMINISTRADOR">Administrador</option>
                <option value="VECINO">Vecino</option>
                <option value="VIGILANTE">Vigilante</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="registrarVecino()">Guardar Vecino</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<!-- INICIO MODAL -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de vecino</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="frmEditarVecino">
          <div class="row">
            <div class="col-lg-6 mb-3">
              <label for="">Primer Nombre</label>
              <input type="text" class="form-control" id="txtPrimerNombreEditar" placeholder="Ingrese el primer nombre del vecino">
              <input type="hidden" id="txtIdVecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Segundo Nombre</label>
              <input type="text" class="form-control" id="txtSegundoNombreEditar" placeholder="Ingrese el segundo nombre del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Primer Apellido</label>
              <input type="text" class="form-control" id="txtPrimerApellidoEditar" placeholder="Ingrese el primer apellido del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Segundo Apellido</label>
              <input type="text" class="form-control" id="txtSegundoApellidoEditar" placeholder="Ingrese el segundo apellido del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Fecha Nacimiento</label>
              <input type="date" class="form-control" id="txtFechaNacimientoEditar" placeholder="Ingrese la fecha de nacimiento del vecino">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Numero de Telefono</label>
              <input type="text" class="form-control" id="txtTelefonoEditar" placeholder="Tel Ej: +504 0000-0000">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Cedula - Identidad</label>
              <input type="email" class="form-control" id="txtIdentidadEditar" placeholder="Ingrese el numero de identidad, sin separaciones ni guiones">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Numero de casa</label>
              <input type="text" class="form-control" id="txtNumeroCasaEditar" placeholder="Ingrese el numero de casa">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Numero de bloque</label>
              <input type="text" class="form-control" id="txtNumeroBloqueEditar" placeholder="Ingrese el numero de bloque">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Cantidad de Vehiculos</label>
              <input type="number" min="0" name="vehiculos" id="txtVehiculoEditar" class="form-control" placeholder="Qty. Vehiculos">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Username</label>
              <input type="text" class="form-control" id="txtUsernameEditar" placeholder="Ingrese el username para la persona">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Password</label>
              <input type="password" name="vehiculos" id="txtPasswordEditar" class="form-control" placeholder="*******************">
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">Tipo Usuario</label>
              <select class="form-control" id="txtRolVecinoEditar">
                <option value="ADMINISTRADOR">Administrador</option>
                <option value="VECINO">Vecino</option>
                <option value="VIGILANTE">Vigilante</option>
              </select>
            </div>
            <div class="col-lg-6 mb-3">
              <label for="">ESTADO</label>
              <select class="form-control" id="txtEstado">
                <option value="ACTIVO">Activo</option>
                <option value="INACTIVO">Inactivo</option>
              </select>
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnEditarVecino" onclick="editarInformacionVecino()">Actualizar</button>
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