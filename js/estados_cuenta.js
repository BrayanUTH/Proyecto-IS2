var tablaEstadoCuenta;
function listarEstadoCuentaVecino() {

    let vecino = document.querySelector("#txtIdVecino").value;
    let fechaInicio = document.querySelector("#txtFechaInicio").value;
    let fechaFin = document.querySelector("#txtFechaFin").value;

    tablaEstadoCuenta = $("#tablaEstadoCuenta").DataTable({
        dom: "ftprB",
        buttons: ["csv", "excel", "pdf", "print"],
        paging: true,
        ordering: true,
        pageLength: 5,
        destroy: true,
        async: false,
        responsive: true,
        autoWidth: false,

        ajax: {
            method: "POST",
            url: "controller/vecinos/controller_estados_cuenta.php?opcion=listar",
            data: {
                fechaInicio: fechaInicio,
                fechaFin: fechaFin,
                vecino: vecino
            }
        },
        columns: [
            { data: "car_id" },
            { data: "fecha_cargo" },
            { data: "monto_cargo" },
            { data: "descripcion_cargo" },
            { data: "fecha" },
            { data: "agencia_bancario" },
            { data: "numero_referencia" },
            {
                "data": "deposito_estado",
                render: function (data) {
                    if (data === "ACTIVO") {
                        return "<span class='badge badge-success badge-pill m-r-5 m-b-5'>" + "PAGADO" + "</span>";
                    } else {
                        return "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>" + "NO PAGADO" + "</span>";
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

    setTimeout(() => {
        calcularTotales()
    }, 2000);
}


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
                    "<button class='seleccionar btn btn-success'><i class='fas fa-plus'></i></button>",
            },
        ],
        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            $($(nRow).find("td")[2]).css("text-align", "center");
            $($(nRow).find("td")[3]).css("text-align", "center");
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

$("#tablaSeleccionarVecino").on("click", ".seleccionar", function () {
    var data = tablaSeleccionarUsuario.row($(this).parents("tr")).data();
    if (tablaSeleccionarUsuario.row(this).child.isShown()) {
        var data = tablaSeleccionarUsuario.row(this).data();
    }


    if (data.estado === "INACTIVO") {
        return Swal.fire("Mensaje de advertencia", "El vecino no se puede seleccionar ya que esta inactivo", "warning");
    }
    document.querySelector("#txtIdVecino").value = data.id_vecino;
    document.querySelector("#txtNombreVecino").value = data.nombre_vecino;

    $("#modal_seleccionar").modal("hide");

    listarEstadoCuentaVecino();
});

function calcularTotales() {
    let cargos = 0
    let depositos = 0

    $("#tablaEstadoCuenta tbody#tbodyDetalle tr").each(function () {
        cargos += parseFloat($(this).find('td').eq(2).text());

        if ($(this).find('td').eq(7).text() === "PAGADO") {
            depositos += parseFloat($(this).find('td').eq(2).text());
        }
    });

    document.getElementById("txtcargo").textContent = cargos.toFixed(2);
    document.getElementById("txtdeposito").textContent = depositos.toFixed(2);
    document.getElementById("txttotal").textContent = ((-cargos + depositos) * (-1)).toFixed(2);
}