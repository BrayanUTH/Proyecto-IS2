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
                return `<a href="impresion_cuenta.php?id=${data}" class="btn btn-secondary"><i class="fas fa-print"></i></a>`;
            }
        
        }

        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $($(nRow).find("td")[5]).css('text-align', 'left');
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        select: true
    });

}
