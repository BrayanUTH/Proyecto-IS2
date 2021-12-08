var tablaMantenimientoPago;
function listarMantenimientoPago() {
  tablaMantenimientoPago = $("#tablaMantenimientoPago").DataTable({
    dom: "lftiprB",
    buttons: ["excel", "pdf", "print"],
    paging: true,
    ordering: true,
    pageLength: 10,
    destroy: true,
    async: false,
    responsive: true,
    autoWidth: false,

    ajax: {
      method: "POST",
      url: "controller/pagos/controller_mantenimiento_pago.php",
    },
    columns: [
      { data: "id_pago" },
      //   { data: "id_vecino" },
      { data: "fecha" },
      { data: "monto" },
      { data: "tipo_gasto" },
      { data: "descripcion" },

      {
        defaultContent:
          "<button class='editar btn btn-warning'><i class='fas fa-edit'></i></button>",
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


function guardarPago() {
  var fecha = document.querySelector("#fechaPago").value;
  var monto = document.querySelector("#montoPago").value;
  var tipo = document.querySelector("#tipoGasto").value;
  var descripcion = document.querySelector("#descripcion").value;

  if (!permitirGuardarPago(fecha, monto, tipo, descripcion)) {

  } else {
    $.ajax({
      url: "controller/pagos/controller_pagos.php?opcion=guardar",
      type: "POST",
      data: {
        accion: "guardar",
        fecha: fecha,
        monto: monto,
        tipo: tipo,
        descripcion: descripcion,
      },
    }).done(function (resp) {
      if (isNaN(resp)) {
        alert(resp);
      } else {
        if (resp > 0) {
          if (resp == 1) {
            Swal.fire(
              "Mensaje de confirmacion",
              "Registro guardado correctamente",
              "success"
            );
            tablaMantenimientoPago.ajax.reload();
            $("#form_pago")[0].reset();
          }
        } else {
          Swal.fire(
            "Mensaje de advertencia",
            "La peticion no se pudo completar",
            "warning"
          );
        }
      }
    });
  }
}

function abrirModalEditar() {
     $("#modal_editar").modal("show");
}

function editarPago() {
  let idPago = document.querySelector('#txtIdPagoE').value;
  let fecha = document.querySelector('#fechaPagoE').value;
  let monto = document.querySelector('#montoPagoE').value;
  let tipo = document.querySelector('#tipoGastoE').value;
  let descripcion = document.querySelector('#descripcionE').value;


  if (idPago.length == 0 || fecha.length == 0 || monto.length == 0 || tipoGasto.length == 0 || descripcion.length == 0) {
    return Swal.fire('Mensaje de advertencia', 'Llene los campos vacios', 'warning');
  }

  $.ajax({
    url: 'controller/pagos/controller_pagos.php?opcion=editar',
    type: 'POST',
    data: {
      idPago: idPago,
      fecha: fecha,
      monto: monto,
      tipo: tipo,
      descripcion: descripcion,
    }
  }).done(function (resp) {
    if (resp > 0) {

      if (resp == 1) {
        tablaMantenimientoPago.ajax.reload();
        $("#modal_editar").modal('hide');
        Swal.fire('Mensaje de confirmacion', 'Datos actualizados correctamente', 'success');
      } 
    } else {
      Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
    }
  });
}


$('#tablaMantenimientoPago').on('click', '.editar', function () {
  var data = tablaMantenimientoPago.row($(this).parents('tr')).data();

  if (tablaMantenimientoPago.row(this).child.isShown()) {
    var data = tablaMantenimientoPago.row(this).data();
  }
  loadDataModel(data);
});


function loadDataModel(data) {
  let {id_pago, fecha, monto, tipo_gasto, descripcion} = data;

  document.querySelector("#txtIdPagoE").value = id_pago;
  document.querySelector("#fechaPagoE").value = fecha;
  document.querySelector("#montoPagoE").value = monto;
  document.querySelector("#descripcionE").value = descripcion;

  $("#tipoGastoE").val(tipo_gasto).trigger("change");

  $("#modal_editar").modal('show');
}
/**************************************************************************************************************************/
function permitirGuardarPago(fecha, monto, tipo, descripcion) {
  let mensaje = "";

  if (validarVacio(fecha)) {
    mensaje = "La fecha del pago no puede estar vacia";
  } else if (validarVacio(monto)) {
    mensaje = "El monto no puede estar vacio";
  } else if (!es_numero(monto)) {
    mensaje = "El monto debe ser un numero";
  } else if (validarVacio(tipo)) {
    mensaje = "Debe seleccionar un tipo de pago";
  } else if (validarVacio(descripcion)) {
    mensaje = "La descripcion del pago no puede estar vacia";
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
