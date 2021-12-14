var tablaMantenimientoDeposito;
function listarMantenimientoDeposito() {
    tablaMantenimientoDeposito = $("#tablaMantenimientoDeposito").DataTable({
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
            "url": "controller/deposito/controller_deposito.php?opcion=listar",
        },
        "columns": [
            { "data": "id_deposito" },
            { "data": "nombre_vecino" },
            { "data": "fecha" },
            { "data": "monto" },
            { "data": "agencia_bancario" },
            { "data": "numero_referencia" },
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        select: true
    });
}

function registrarDeposito() {
    let txtFecha = $('#txtFecha').val();
    let txtMonto = $('#txtMonto').val();
    let txtAgencia = $('#txtAgencia').val();
    let txtNumeroReferencia = $('#txtNumeroReferencia').val();
    let cboVecino = $('#cboVecino').val();
    let cboCargo = $('#cboCargo').val();

    if (txtFecha.length == 0 || txtMonto.length == 0 || txtAgencia.length == 0 || txtNumeroReferencia.length == 0 || cboVecino.length == 0) {
        return Swal.fire('Mensaje de advertencia', 'Todos los campos son obligatorios', 'warning');
    }

    $.ajax({
        url: 'controller/deposito/controller_deposito.php?opcion=registrar',
        type: 'POST',
        data: {
            fecha: txtFecha,
            monto: txtMonto,
            agencia: txtAgencia,
            numeroReferencia: txtNumeroReferencia,
            vecino: cboVecino,
            cargo: cboCargo
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                tablaMantenimientoDeposito.ajax.reload();
                document.getElementById('frmRegistroDeposito').reset();
                $("#modal_registro").modal('hide');
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
        url: "controller/deposito/controller_deposito.php?opcion=listarComboCargo",
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
            document.querySelector('#cboCargo').innerHTML = "No se encontraron datos";
        }
    });
}


function abrirModal() {
    $("#modal_registro").modal('show');
}
