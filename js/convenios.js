var tablaMantenimientoConvenio;
function listarMantenimientoConvenio() {
  tablaMantenimientoConvenio = $("#tablaMantenimientoConvenio").DataTable({
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
      "url": "controller/convenio/controller_convenio.php?opcion=listar",
    },
    "columns": [
      { "data": "id_convenio" },
      { "data": "fecha_inicio" },
      { "data": "monto_inicial" },
      { "data": "prima" },
      { "data": "descuento" },
      { "data": "saldo_restante" },
      { "data": "cuotas" },
      { "data": "fecha_ultimo_pago" },
      { "data": "nombre_vecino" },
    ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },
    select: true
  });
}

function registrarConvenio() {
    let cmbMonto = $('#cboMonto').val();
    let txtPrima = $('#txtPrima').val();
    let txtDescuento = $('#txtDescuento').val();
    let txtSaldo = $('#txtSaldo').val();
    let txtCuota = $('#txtCuota').val();
    let txtDetalle = $('#txtDetalles').val();
    let txtFechaUltimo = $('#txtFechaUltimo').val();
    let cboVecino = $('#cboVecino').val();

    if (cmbMonto.length == 0 || txtPrima.length == 0 || txtDescuento.length == 0 || txtSaldo.length == 0 || txtCuota.length == 0 || txtDetalle.length == 0 ||
         txtFechaUltimo.length == 0 ||cboVecino.length == 0) {
        return Swal.fire('Mensaje de advertencia', 'Todos los campos son obligatorios', 'warning');
    }

    $.ajax({
        url: 'controller/convenio/controller_convenio.php?opcion=registrar',
        type: 'POST',
        data: {
            monto: cmbMonto,
            prima: txtPrima,
            descuento: txtDescuento,
            saldo: txtSaldo,
            cuota: txtCuota,
            detalle: txtDetalle,
            fechaultimo: txtFechaUltimo,
            vecino: cboVecino,
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                tablaMantenimientoConvenio.ajax.reload();
                document.getElementById('frmRegistroConvenio').reset();
                Swal.fire('Mensaje de confirmacion', 'Datos guardados correctamente', 'success');
            }
        } else {
            Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
        }
    }); 
}

function listarComboVecino() {
    $.ajax({
        url: "controller/deposito/controller_deposito.php?opcion=listarComboVecino",
        type: "POST"
    }).done(function (resp) {
        let data = JSON.parse(resp);
        let cadena = "";
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id_vecino'] + "'>" + data[i]['nombre_vecino'] + "</option>";
            }
            document.querySelector('#cboVecino').innerHTML = cadena;
        } else {
            document.querySelector('#cboVecino').innerHTML = "No se encontraron datos";
        }
    });
}

function listarComboCargo() {
    $.ajax({
        url: "controller/convenio/controller_convenio.php?opcion=listarComboCargo",
        type: "POST"
    }).done(function (resp) {
        let data = JSON.parse(resp);
        let cadena = "";
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i]['id_cargo'] + "'>" + data[i]['nombre'] + "</option>";
            }
            document.querySelector('#cboCargo').innerHTML = cadena;
           
        } else {
            document.querySelector('#cboMonto').innerHTML = "No se encontraron datos";
        }
    });
}

