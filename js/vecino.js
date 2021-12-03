var tablaMantenimientoVecino;

function listarMantenimientoVecino() {
  tablaMantenimientoVecino = $("#tablaMantenimientoVecino").DataTable({
    dom: 'lftiprB',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "paging": true,
    "ordering": true,
    "pageLength": 10,
    "destroy": true,
    "async": false,
    "responsive": true,
    "autoWidth": false,

    "ajax": {
      "method": "POST",
      "url": "controller/vecinos/controller_vecino.php?opcion=listarVecino",
    },
    "columns": [
      { "data": "id_vecino" },
      { "data": "nombre_vecino" },
      { "data": "dni" },
      { "data": "fecha_nacimiento" },
      { "data": "telefono" },
      { "data": "num_casa" },
      { "data": "num_bloque" },
      { "data": "cant_vehiculos" },
      { "data": "usuario" },
      { "data": "contrasenia" },
      {
        "data": "estado",
        render: function (data) {
            if (data === "ACTIVO") {
                return "<span class='badge badge-success badge-pill m-r-5 m-b-5'>" + data + "</span>";
            } else {
                return "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>" + data + "</span>";
            }
        }
    },
      { "defaultContent": "<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button class='btnVerVecino btn btn-warning'><i class='fa fas fa-eye'></i></button>" },
    ],
    "fnRowCallback": function (nRow) {
      $($(nRow).find("td")[5]).css('text-align', 'left');
    },
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },
    select: true
  });
}

$('#tablaMantenimientoVecino').on('click', '.editar', function () {
  var data = tablaMantenimientoVecino.row($(this).parents('tr')).data(); //Detecta a que fila hago click y me captura los datos en la variable data

  if (tablaMantenimientoVecino.row(this).child.isShown()) { //Cuando esta en tamaño responsivo
    var data = tablaMantenimientoVecino.row(this).data();
  }
  loadData(data, 'editar');

});

$('#tablaMantenimientoVecino').on('click', '.btnVerVecino', function () {
  var data = tablaMantenimientoVecino.row($(this).parents('tr')).data(); //Detecta a que fila hago click y me captura los datos en la variable data

  if (tablaMantenimientoVecino.row(this).child.isShown()) { //Cuando esta en tamaño responsivo
    var data = tablaMantenimientoVecino.row(this).data();
  }
  loadData(data, 'ver');
});



function loadData(data, tipo) {
  let { id_vecino, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cant_vehiculos, contrasenia, dni, estado, fecha_nacimiento,
    num_bloque, num_casa, telefono, tipo_usuario, usuario } = data;

  $('#txtPrimerNombreEditar').val(primer_nombre);
  $('#txtSegundoNombreEditar').val(segundo_nombre);
  $('#txtPrimerApellidoEditar').val(primer_apellido);
  $('#txtSegundoApellidoEditar').val(segundo_apellido);
  $('#txtFechaNacimientoEditar').val(fecha_nacimiento);
  $('#txtTelefonoEditar').val(telefono);
  $('#txtIdentidadEditar').val(dni);
  $('#txtNumeroCasaEditar').val(num_casa);
  $('#txtNumeroBloqueEditar').val(num_bloque);
  $('#txtVehiculoEditar').val(cant_vehiculos);
  $('#txtUsernameEditar').val(usuario);
  $('#txtPasswordEditar').val(contrasenia);
  $('#txtIdVecino').val(id_vecino);

  $("#txtRolVecinoEditar").val(tipo_usuario).trigger("change");
  $("#txtEstado").val(estado).trigger("change");

    if (tipo == 'editar') {
      $("#btnEditarVecino").prop('disabled', false);
    } else {
      $("#btnEditarVecino").prop('disabled', true);
    }

  $("#modal_editar").modal('show');
}

function editarInformacionVecino() {
  let txtPrimerNombre = $('#txtPrimerNombreEditar').val();
  let txtSegundoNombre = $('#txtSegundoNombreEditar').val();
  let txtPrimerApellido = $('#txtPrimerApellidoEditar').val();
  let txtSegundoApellido = $('#txtSegundoApellidoEditar').val();
  let txtFechaNacimiento = $('#txtFechaNacimientoEditar').val();
  let txtTelefono = $('#txtTelefonoEditar').val();
  let txtIdentidad = $('#txtIdentidadEditar').val();
  let txtNumeroCasa = $('#txtNumeroCasaEditar').val();
  let txtNumeroBloque = $('#txtNumeroBloqueEditar').val();
  let txtVehiculo = $('#txtVehiculoEditar').val();
  let txtUsername = $('#txtUsernameEditar').val();
  let txtPassword = $('#txtPasswordEditar').val();
  let txtIdVecino = $('#txtIdVecino').val();
  let txtRolVecino = $("#txtRolVecinoEditar").val();
  let txtEstado = $("#txtEstado").val();

  if (txtPrimerNombre.length == 0 || txtSegundoNombre.length == 0 || txtPrimerApellido.length == 0 || txtSegundoApellido.length == 0
    || txtFechaNacimiento.length == 0 || txtTelefono.length == 0 || txtIdentidad.length == 0 || txtNumeroCasa.length == 0
    || txtNumeroBloque.length == 0 || txtVehiculo.length == 0 || txtUsername.length == 0 || txtPassword.length == 0 || txtRolVecino.length == 0) {
    return Swal.fire('Mensaje de advertencia', 'Todos los campos son obligatorios', 'warning');
  }

  $.ajax({
    url: 'controller/vecinos/controller_vecino.php?opcion=editarVecino',
    type: 'POST',
    data: {
      primerNombre: txtPrimerNombre,
      segundoNombre: txtSegundoNombre,
      primerApellido: txtPrimerApellido,
      aegundoApellido: txtSegundoApellido,
      fechaNacimiento: txtFechaNacimiento,
      telefonoR: txtTelefono,
      identidad: txtIdentidad,
      numeroCasa: txtNumeroCasa,
      numeroBloque: txtNumeroBloque,
      vehiculo: txtVehiculo,
      username: txtUsername,
      password: txtPassword,
      rolVecino: txtRolVecino,
      txtIdVecino: txtIdVecino,
      txtEstado: txtEstado
    }
  }).done(function (resp) {
    console.log('Paso2');
    if (resp > 0) {
      if (resp == 1) {
        tablaMantenimientoVecino.ajax.reload();
        $("#modal_editar").modal('hide');
        document.querySelector('#frmEditarVecino').reset();
        Swal.fire('Mensaje de confirmacion', 'Datos actualizados correctamente', 'success');
      } else if (resp == 2) {
        Swal.fire('Mensaje de advertencia', 'El DNI ya se encuentra registrado en el sistema, esa persona ya esta registrada', 'warning');
      } else {
        Swal.fire('Mensaje de advertencia', 'El username ingresado ya pertenece a otro usuario.', 'warning');
      }
    } else {
      Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
    }
  });
}

function registrarVecino() {
  var txtPrimerNombre = document.querySelector('#txtPrimerNombre').value;
  var txtSegundoNombre = document.querySelector('#txtSegundoNombre').value;
  var txtPrimerApellido = document.querySelector('#txtPrimerApellido').value;
  var txtSegundoApellido = document.querySelector('#txtSegundoApellido').value;
  var txtFechaNacimiento = document.querySelector('#txtFechaNacimiento').value;
  var txtTelefonoR = document.querySelector('#txtTelefonoR').value;
  var txtIdentidad = document.querySelector('#txtIdentidad').value;
  var txtNumeroCasa = document.querySelector('#txtNumeroCasa').value;
  var txtNumeroBloque = document.querySelector('#txtNumeroBloque').value;
  var txtVehiculo = document.querySelector('#txtVehiculo').value;
  var txtUsername = document.querySelector('#txtUsername').value;
  var txtPassword = document.querySelector('#txtPassword').value;
  var txtRolVecino = document.querySelector('#txtRolVecino').value;

  if (txtPrimerNombre.length == 0 || txtSegundoNombre.length == 0 || txtPrimerApellido.length == 0 || txtSegundoApellido.length == 0
    || txtFechaNacimiento.length == 0 || txtTelefonoR.length == 0 || txtIdentidad.length == 0 || txtNumeroCasa.length == 0
    || txtNumeroBloque.length == 0 || txtVehiculo.length == 0 || txtUsername.length == 0 || txtPassword.length == 0 || txtRolVecino.length == 0) {
    return Swal.fire('Mensaje de advertencia', 'Todos los campos son obligatorios', 'warning');
  }
  $.ajax({
    url: 'controller/vecinos/controller_vecino.php?opcion=registrarVecino',
    type: 'POST',
    data: {
      primerNombre: txtPrimerNombre,
      segundoNombre: txtSegundoNombre,
      primerApellido: txtPrimerApellido,
      aegundoApellido: txtSegundoApellido,
      fechaNacimiento: txtFechaNacimiento,
      telefonoR: txtTelefonoR,
      identidad: txtIdentidad,
      numeroCasa: txtNumeroCasa,
      numeroBloque: txtNumeroBloque,
      vehiculo: txtVehiculo,
      username: txtUsername,
      password: txtPassword,
      rolVecino: txtRolVecino
    }
  }).done(function (resp) {
    if (resp > 0) {
      if (resp == 1) {
        tablaMantenimientoVecino.ajax.reload();
        $("#modal_registro").modal('hide');
        document.querySelector('#frmRegistrarVecino').reset();
        Swal.fire('Mensaje de confirmacion', 'Datos registrados correctamente', 'success');
      } else if (resp == 2) {
        Swal.fire('Mensaje de advertencia', 'El DNI ya se encuentra registrado en el sistema, esa persona ya esta registrada', 'warning');
      } else {
        Swal.fire('Mensaje de advertencia', 'El username ingresado ya pertenece a otro usuario.', 'warning');
      }
    } else {
      Swal.fire('Mensaje de advertencia', 'El registro no se pudo completar', 'warning');
    }
  });
}


var tablaEstatusGeneralVecinos;
function listarEstatusGeneralVecino() {
  tablaEstatusGeneralVecinos = $("#tablaEstatusGeneralVecinos").DataTable({
    dom: 'lftiprB',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "paging": true,
    "ordering": true,
    "pageLength": 10,
    "destroy": true,
    "async": false,
    "responsive": true,
    "autoWidth": false,
    "ajax": {
      "method": "POST",
      "url": "controller/vecinos/controller_estatus_general_vecinos.php",
    },
    "columns": [
      { "data": "VECINO" },
      { "data": "DEBITO" },
      { "data": "CREDITOS" },
      { "data": "SALDO" }
    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },
    select: true
  });
}

function abrirModal() {
  $("#modal_registro").modal('show');
}