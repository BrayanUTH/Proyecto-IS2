var tablaEstadoCuenta;

function listarEstadoCuenta() {
    tablaEstadoCuenta = $("#tablaEstadoCuenta").DataTable({
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
            "url": "controller/controller_estados_cuenta.php",
        },
        "columns": [
            { "data": "id_vecino" },
            { "data": "Nombre" },
            { "data": "Casa" },
            { "data": "Bloque" },
            { "data": "vehiculos" },
            { "data": "id_anterior" },
            { "data": "id_vecino",
            render: function(data) {
                return `<a href="impresion_cuenta.php?id=${data}" target="_BLANK" class="btn btn-secondary"><i class="fas fa-print"></i></a>`;
            }
        }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        select: true
    });

}

var tablaEstadoCuentaVecino;
function listarEstadoCuentaVecino() {
    var idUsuario = $('#txtIdUsuarioLogeado').val();
    console.log(idUsuario);

    tablaEstadoCuentaVecino = $("#tablaEstadoCuentaVecino").DataTable({
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
            "url": "controller/controller_estados_cuentaVecino.php",
            data: {
                idUsuario: idUsuario
            }
        },
        "columns": [
            { "data": "id_vecino" },
            { "data": "Nombre" },
            { "data": "Casa" },
            { "data": "Bloque" },
            { "data": "vehiculos" },
            { "data": "id_anterior" },
            { "data": "id_vecino",
            render: function(data) {
                return `<a href="impresion_cuenta_vecino.php?id=${data}" target="_BLANK" class="btn btn-secondary"><i class="fas fa-print"></i></a>`;
            }
        }

        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        select: true
    });

}
