var tablaTransacciones;

function listarTransacciones() {
    tablaTransacciones = $("#tablaTransacciones").DataTable({
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
            "url": "controller/transacciones/controller_listar_transacciones.php",
        },
        "columns": [
            { "data": "id_transaccion" },
            { "data": "id_vecino" },
            { "data": "id_vecino_anterior" },
            { "data": "nombre_vecino" },
            { "data": "periodo" },
            { "data": "fecha" },
            { "data": "descripcion" },
            { "data": "debito" },
            { "data": "creditos" },
            { "data": "asentado" },
            { "defaultContent": "<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button class='eliminar btn btn-danger'><i class='fas fa fa-times-circle'></i></button>" }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        select: true
    });
}

$('#tablaTransacciones').on('click', '.editar', function () {
    var data = tablaTransacciones.row($(this).parents('tr')).data(); 

    if (tablaTransacciones.row(this).child.isShown()) { 
        var data = tablaTransacciones.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false }); 
    $("#modal_editar").modal('show');
    document.querySelector("#txtIdTransaccion").value = data.id_transaccion;
    document.querySelector("#txtIdVecino").value = data.id_vecino;
    document.querySelector("#txtIdAnterior").value = data.id_vecino_anterior;
    document.querySelector("#txtNombre").value = data.nombre_vecino;
    document.querySelector("#txtPeriodo").value = data.periodo;
    document.querySelector("#txtFecha").value = data.fecha;
    document.querySelector("#txtDebito").value = data.debito;
    document.querySelector("#txtCredito").value = data.creditos;
    document.querySelector("#txtAsentado").value = data.asentado;
    document.querySelector("#txtDescripcion").value = data.descripcion;
});

function editarTransaccion() {
    var idTransaccion = document.querySelector('#txtIdTransaccion').value;
    var idVecino = document.querySelector('#txtIdVecino').value;
    var idAnterior = document.querySelector('#txtIdAnterior').value;
    var nombre = document.querySelector('#txtNombre').value;
    var periodo = document.querySelector('#txtPeriodo').value;
    var fecha = document.querySelector('#txtFecha').value;
    var debito = document.querySelector('#txtDebito').value;
    var credito = document.querySelector('#txtCredito').value;
    var asentado = document.querySelector('#txtAsentado').value;
    var descripcion = document.querySelector('#txtDescripcion').value;

    if (idTransaccion.length == 0 || idVecino.length == 0 || idAnterior.length == 0 || nombre.length == 0 || periodo.length == 0 || fecha.length == 0 ||
        debito.length == 0 || credito.length == 0 || asentado.length == 0 || descripcion.length == 0 ) {
        Swal.fire('Mensaje de advertencia', 'Por favor llene todos los campos, es obligatorio', 'warning');
    }

    $.ajax({
        url: 'controller/transacciones/controller_editar_transaccion.php',
        type: 'POST',
        data: {
            idTransaccion: idTransaccion,
            idVecino: idVecino,
            idAnterior: idAnterior,
            nombre: nombre,
            periodo: periodo,
            fecha: fecha,
            debito: debito,
            credito: credito,
            asentado: asentado,
            descripcion: descripcion,
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                tablaTransacciones.ajax.reload();
                $("#modal_editar").modal('hide');
                Swal.fire('Mensaje de confirmacion', 'Datos actualizados correctamente', 'success');
            }
        } else {
            Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
        }
    });
}

$('#tablaTransacciones').on('click', '.eliminar', function () {
    var data = tablaTransacciones.row($(this).parents('tr')).data(); //Detecta a que fila hago click y me captura los datos en la variable data

    if (tablaTransacciones.row(this).child.isShown()) { //Cuando esta en tamaño responsivo
        var data = tablaTransacciones.row(this).data();
    }

    Swal.fire({
        title: '¿Desea eliminar la transaccion? ' + data.persona_nombre + ' ' + data.persona_apepat + ' ' + data.persona_apmat + ' ?',
        text: "Una vez eliminada no podra recuperar la transaccion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarTransaccion(data.id_transaccion);
        }
    })
});

function eliminarTransaccion(idTransaccion) {
    $.ajax({
        url: 'controller/transacciones/controller_eliminar_transaccion.php',
        type: 'POST',
        data: {
            idTransaccion: idTransaccion            
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                tablaTransacciones.ajax.reload();
                $("#modal_editar").modal('hide');
                Swal.fire('Mensaje de confirmacion', 'Transaccion eliminada correctamente', 'success');
            }
        } else {
            Swal.fire('Mensaje de advertencia', 'La transaccion no se pudo eliminar', 'warning');
        }
    });
}