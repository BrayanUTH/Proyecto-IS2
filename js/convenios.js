function listarVecinoParaSeleccionar() {
  tablaSeleccionarUsuario = $("#tablaSeleccionarVecino").DataTable({
    dom: "ftpr",
    paging: true,
    ordering: true,
    pageLength: 5,
    destroy: true,
    async: false,
    responsive: true,
    autoWidth: false,

    ajax: {
      method: "POST",
      url: "controller/vecinos/controller_mantenimiento_vecinos.php",
    },
    columns: [
      { data: "id_vecino" },
      { data: "nombre_vecino" },
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
      {
        defaultContent:
          "<button class='seleccionar btn color-dark-blue'><i class=' fas fa-solid fa-check'></i></button>",
      },
    ],
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[5]).css("text-align", "left");
    },
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
    },
    select: true,
  });
}

function listarCargoParaSeleccionar() {
  tablaSeleccionarCargo = $("#tablaSeleccionarCargo").DataTable({
    dom: "ftpr",
    // buttons: ["copy", "csv", "excel", "pdf", "print"],
    paging: true,
    ordering: true,
    pageLength: 5,
    destroy: true,
    async: false,
    responsive: true,
    autoWidth: false,

    ajax: {
      method: "POST",
      url: "controller/cargos/controller_cargo_mensual.php?accion=listar",
    },
    columns: [
      { data: "id_cargo" },
      { data: "descripcion_cargo" },
      { data: "monto_cargo" },
      {
        "data": "estado_cargo",
        render: function (data) {
          if (data === "ACTIVO") {
            return "<span class='badge badge-success badge-pill m-r-5 m-b-5'>" + data + "</span>";
          } else {
            return "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>" + data + "</span>";
          }
        }
      },
      {
        defaultContent:
          "<button class='seleccionar btn color-dark-blue'><i class=' fas fa-solid fa-check'></i></button>",
      },
    ],
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      $($(nRow).find("td")[5]).css("text-align", "left");
    },
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
    },
    select: true,
  });
}

function abrirModal() {
  $("#modal_seleccionar").modal("show");
}

function abrirModalCargo() {
  $("#modal_seleccionar_cargo").modal("show");
}

$("#tablaSeleccionarVecino").on("click", ".seleccionar", function () {
  var data = tablaSeleccionarUsuario.row($(this).parents("tr")).data();
  if (tablaSeleccionarUsuario.row(this).child.isShown()) {
    var data = tablaSeleccionarUsuario.row(this).data();
  }


  if (data.estado === "INACTIVO") {
    return Swal.fire("Mensaje de advertencia", "El vecino no se puede seleccionar ya que esta inactivo", "warning");
  }

  if ($('#modal_editar').is(':visible')) {

    document.querySelector("#txtIdVecinoE").value = data.id_vecino;
    document.querySelector("#txtNombreE").value = data.nombre_vecino;
  } else {

    document.querySelector("#txtIdVecino").value = data.id_vecino;
    document.querySelector("#txtNombre").value = data.nombre_vecino;
  }


  $("#modal_seleccionar").modal("hide");
});

$("#tablaSeleccionarCargo").on("click", ".seleccionar", function () {
  var data = tablaSeleccionarCargo.row($(this).parents("tr")).data();
  if (tablaSeleccionarCargo.row(this).child.isShown()) {
    var data = tablaSeleccionarCargo.row(this).data();
  }


  if (data.cargo_estado === "ANULADO") {
    return Swal.fire("Mensaje de advertencia", "El cargo no se puede seleccionar ya que esta anulado", "warning");
  }

  if ($('#modal_editar').is(':visible')) {

    document.querySelector("#txtIdCargoE").value = data.id_cargo;
    document.querySelector("#txtMontoCargoE").value = data.monto_cargo;
    document.querySelector("#descripcion_cargoE").value = data.descripcion_cargo + " //" + data.monto_cargo + "lps";
  } else {

    document.querySelector("#txtIdCargo").value = data.id_cargo;
    document.querySelector("#txtMontoCargo").value = data.monto_cargo;
    document.querySelector("#monto").value = data.monto_cargo;
    document.querySelector("#descripcion_cargo").value = data.descripcion_cargo + " //" + data.monto_cargo + "lps";
  }


  $("#modal_seleccionar_cargo").modal("hide");
});



function permitirGuardarConvenio(
  idVecino,
  fechaInicial,
  saldo,
  prima,
  cuotas,
  descuento,
  saldoRes,
  descrip,
  fechaFin
) {
  let mensaje = "";

  if (validarVacio(idVecino)) {
    mensaje = "Debe seleccionar un vecino";
  } else if (validarVacio(fechaInicial)) {
    mensaje = "Debe seleccionar una fecha";
  } else if (validarVacio(saldo)) {
    mensaje = "Debe ingresar un monto inicial";
  } else if (!es_numero(saldo)) {
    mensaje = "El monto inicial debe ser un numero";
  } else if (validarVacio(prima)) {
    mensaje = "Debe ingresar una prima";
  } else if (!es_numero(prima)) {
    mensaje = "La prima debe ser un numero";
  } else if (validarVacio(cuotas)) {
    mensaje = "Debe ingresar el numero de cuotas";
  } else if (!es_numero(cuotas)) {
    mensaje = "El numero de cuotas debe ser un numero";
  } else if (validarVacio(descuento)) {
    mensaje = "Debe ingresar un descuento";
  } else if (!es_numero(descuento)) {
    mensaje = "El descuento debe ser un numero";
  } else if (validarVacio(saldoRes)) {
    mensaje = "Debe ingresar un saldo";
  } else if (!es_numero(saldoRes)) {
    mensaje = "El saldo debe ser un numero";
  } else if (validarVacio(descrip)) {
    mensaje = "Debe ingresar una descripcion";
  } else if (validarVacio(fechaFin)) {
    mensaje = "Debe ingresar una fecha final";
  } else {
    return true;
  }
  Swal.fire("Oops", mensaje, "error");
  return false;
}

function validarVacio(valor) {
  if (valor == "") return true;
  return false;
}

function es_numero(valor) {
  return !isNaN(valor);
}

function tiene_numeros(texto) {
  return false;
}
