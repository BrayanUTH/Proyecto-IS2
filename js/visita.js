var tablaMantenimientoVisita;
function listarMantenimientoVisita() {
    tablaMantenimientoVisita = $("#tablaMantenimientoVisita").DataTable({
        dom: "lftiprB", //Importante para Imprimir los botones, indica la posicion de los botones
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
            url: "controller/visita/controller_visita.php?opcion=listar",
        },
        columns: [
            { data: "id_visita" },
            { data: "fecha_visita" },
            { data: "nombre_vecino" },
            { data: "nombre_visitante" },
            { data: "dni_visita" },
            {
                "data": "status_visita",
                render: function (data) {
                    if (data === "INICIADO") {
                        return "<span class='badge badge-success badge-pill m-r-5 m-b-5'>" + data + "</span>";
                    } else if (data === "INGRESADO") {

                        return "<span class='badge badge-info badge-pill m-r-5 m-b-5'>" + data + "</span>";
                    } else {
                        return "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>" + data + "</span>";
                    }
                }
            },
            {
                "data": "status_visita",
                render: function (data, type, row) {
                    if (data === "INICIADO") {
                        return "<button class='imprimir btn btn-info'><i class='fas fa-edit'></i></button>" + "&nbsp;" +
                            "<button class='anular btn btn-warning'><i class='fas fa-edit'></i></button>"
                    } else {
                        return "--";
                    }
                }
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

var tablaMantenimientoVisitaUsuario;
function listarMantenimientoVisitaUsuario() {
    tablaMantenimientoVisitaUsuario = $("#tablaMantenimientoVisitaUsuario").DataTable({
        dom: "lftiprB", //Importante para Imprimir los botones, indica la posicion de los botones
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
            url: "controller/visita/controller_visita.php?opcion=listarUsuario",
        },
        columns: [
            { data: "id_visita" },
            { data: "fecha_visita" },
            { data: "nombre_vecino" },
            { data: "nombre_visitante" },
            { data: "dni_visita" },
            {
                "data": "status_visita",
                render: function (data) {
                    if (data === "INICIADO") {
                        return "<span class='badge badge-success badge-pill m-r-5 m-b-5'>" + data + "</span>";
                    } else if (data === "INGRESO") {

                        return "<span class='badge badge-info badge-pill m-r-5 m-b-5'>" + data + "</span>";
                    } else {
                        return "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>" + data + "</span>";
                    }
                }
            },
            {
                "data": "status_visita",
                render: function (data, type, row) {
                    if (data === "INICIADO") {
                        return "<button class='imprimir btn btn-info'><i class='fas fa-edit'></i></button>" + "&nbsp;" +
                            "<button class='anular btn btn-warning'><i class='fas fa-edit'></i></button>"
                    } else {
                        return "--";
                    }
                }
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

function guardarVisita() {
    let idVecino = document.querySelector("#txtidVecino").value;
    let primerNombre = document.querySelector("#txtprimerNombre").value;
    let segundoNombre = document.querySelector("#txtsegundoNombre").value;
    let primerApellido = document.querySelector("#txtprimerApellido").value;
    let segundoApellido = document.querySelector("#txtsegundoApellido").value;
    let cedula = document.querySelector("#txtCedula").value;

    if (primerNombre.length == 0 || segundoNombre.length == 0 || primerApellido.length == 0 || segundoApellido.length == 0 || cedula.length == 0) {
        Swal.fire("Mensaje de advertencia", "Llene los campos vacios", "error");
    } else {
        $.ajax({
            url: "controller/visita/controller_visita.php?opcion=registrar",
            type: "POST",
            data: {
                idVecino: idVecino,
                primerNombre: primerNombre,
                segundoNombre: segundoNombre,
                primerApellido: primerApellido,
                segundoApellido: segundoApellido,
                cedula: cedula,
            },
        }).done(function (resp) {
            if (resp > 0) {
                if (resp == 1) {
                    mostrarImg(idVecino)
                    $("#form_visita")[0].reset();
                    tablaMantenimientoVisita.ajax.reload();
                }
            } else {
                Swal.fire(
                    "Mensaje de advertencia",
                    "La peticion no se pudo completar",
                    "warning"
                );
            }
        });
    }
}

function imprimirVisita(idVisita, idVecino) {

    $.ajax({
        url: "controller/visita/controller_visita.php?opcion=imprimir",
        type: "POST",
        data: {
            idVecino: idVecino,
            idVisita: idVisita,

        },
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                setTimeout(mostrarImg(idVecino), 300);
            }
        } else {
            Swal.fire(
                "Mensaje de advertencia",
                "La peticion no se pudo completar",
                "warning"
            );
        }
    });
}

function mostrarImg(idVecino) {
    d = new Date();
    $("#img_qr").attr("src", "temp/" + "img_" + idVecino + ".png?" + d.getTime());
    $("#a_qr").attr("href", "temp/" + "img_" + idVecino + ".png?" + d.getTime());
    $("#modal_qr").modal("show");
}

function anularVisita(idVisita) {

    $.ajax({
        url: "controller/visita/controller_visita.php?opcion=anular",
        type: "POST",
        data: {
            idVisita: idVisita,
        },
    }).done(function (resp) {

        if (resp > 0) {
            if (resp == 1) {
                Swal.fire("Mensaje de confirmacion", " Anulado correctamente", "success");
                tablaMantenimientoVisita.ajax.reload();
            }
        } else {
            Swal.fire(
                "Mensaje de advertencia",
                "La peticion no se pudo completar",
                "warning"
            );
        }
    });
}

$('#tablaMantenimientoVisita').on('click', '.imprimir', function () {
    var data = tablaMantenimientoVisita.row($(this).parents('tr')).data();

    if (tablaMantenimientoVisita.row(this).child.isShown()) {
        var data = tablaMantenimientoVisita.row(this).data();
    }

    imprimirVisita(data.id_visita, data.id_vecino);
})


$('#tablaMantenimientoVisita').on('click', '.anular', function () {
    var data = tablaMantenimientoVisita.row($(this).parents('tr')).data();

    if (tablaMantenimientoVisita.row(this).child.isShown()) {
        var data = tablaMantenimientoVisita.row(this).data();
    }

    anularVisita(data.id_visita);
});

/***********************************************************************/
$('#tablaMantenimientoVisitaUsuario').on('click', '.imprimir', function () {
    var data = tablaMantenimientoVisitaUsuario.row($(this).parents('tr')).data();

    if (tablaMantenimientoVisitaUsuario.row(this).child.isShown()) {
        var data = tablaMantenimientoVisitaUsuario.row(this).data();
    }

    imprimirVisita(data.id_visita, data.id_vecino);
})
