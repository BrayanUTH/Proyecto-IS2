var tablaMantenimientoCargo;
function listarMantenimientoCargo() {
    tablaMantenimientoCargo = $("#tablaMantenimientoCargo").DataTable({
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
            url: "controller/cargos/controller_cargo_mensual.php?accion=listar",
        },
        columns: [
            { data: "id_cargo" },
            //   { data: "id_vecino" },
            { data: "fecha_cargo" },
            { data: "monto_cargo" },
            { data: "descripcion_cargo" },
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
                "data": "estado_cargo",
                render: function (data, type, row) {
                    // if (data === "INGRESADO") {
                    if (data === "ACTIVO") {
                        return "<button class='editar btn btn-info'><i class='fas fa-edit'></i></button>" + "&nbsp;" +
                            "<button class='anular btn color-dark-blue'><i class='fas fa-edit'></i></button>"
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

function guardarCargo() {
    var fecha = document.querySelector("#fechaCargo").value;
    var monto = document.querySelector("#montoCargo").value;
    var descripcion = document.querySelector("#descripcion").value;

    if (!permitirGuardarCargo(fecha, monto, descripcion)) {
    } else {
        $.ajax({
            url: "controller/cargos/controller_cargo_mensual.php?accion=guardar",
            type: "POST",
            data: {
                // accion: "guardar",
                fecha: fecha,
                monto: monto,
                descripcion: descripcion,
            },
        }).done(function (resp) {
            if (isNaN(resp)) {
                alert(resp);
            } else {
                if (resp > 0) {
                    if (resp == 1) {
                        //si se pudo guardar

                        Swal.fire(
                            "Mensaje de confirmacion",
                            "Guardado correctamente",
                            "success"
                        );

                        $("#form_cargo")[0].reset();
                        tablaMantenimientoCargo.ajax.reload();
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


function editarCargo() {
    var idCargo = document.querySelector("#txtIdCargoE").value;
    var fecha = document.querySelector("#fechaCargoE").value;
    var monto = document.querySelector("#montoCargoE").value;
    var descripcion = document.querySelector("#descripcionE").value;

    if (!permitirGuardarCargo(fecha, monto, descripcion)) {
    } else {

        $.ajax({
            url: "controller/cargos/controller_cargo_mensual.php?accion=editar",
            type: "POST",
            data: {
                idCargo: idCargo,
                fecha: fecha,
                monto: monto,
                descripcion: descripcion,
            },
        }).done(function (resp) {
            if (isNaN(resp)) {
                alert(resp);
            } else {
                if (resp > 0) {
                    if (resp == 5) {
                        Swal.fire(
                            "Mensaje de advertencia",
                            "La actualizacion no se puede completar, ya que hay algunos depositos registrados con este cargo",
                            "warning"
                        );

                        $("#modal_editar").modal("hide");
                    }
                    if (resp == 1) {
                        //si se pudo guardar

                        Swal.fire(
                            "Mensaje de confirmacion",
                            "Actualizado correctamente",
                            "success"
                        );

                        $("#modal_editar").modal("hide");
                        tablaMantenimientoCargo.ajax.reload();
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


$("#tablaMantenimientoCargo").on("click", ".editar", function () {
    var data = tablaMantenimientoCargo.row($(this).parents("tr")).data(); //Detecta a que fila hago click y me captura los datos en la variable data

    if (tablaMantenimientoCargo.row(this).child.isShown()) {
        //Cuando esta en tamaño responsivo
        var data = tablaMantenimientoCargo.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: "static", keyboard: false }); //Para que no se cierre el modal
    $("#modal_editar").modal("show");

    //   console.log(data)

    document.querySelector("#txtIdCargoE").value = data.id_cargo;
    document.querySelector("#fechaCargoE").value = data.fecha_cargo;
    document.querySelector("#montoCargoE").value = data.monto_cargo;
    document.querySelector("#descripcionE").value = data.descripcion_cargo;

});

$("#tablaMantenimientoCargo").on("click", ".anular", function () {
    var data = tablaMantenimientoCargo.row($(this).parents("tr")).data(); //Detecta a que fila hago click y me captura los datos en la variable data

    if (tablaMantenimientoCargo.row(this).child.isShown()) {
        //Cuando esta en tamaño responsivo
        var data = tablaMantenimientoCargo.row(this).data();
    }

    Swal.fire({
        title: '¿Estas seguro(a) de anular este cargo mensual?',
        showCancelButton: true,
        confirmButtonText: 'Anular',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            anularCargo(data.id_cargo)
        }
    })

});


function anularCargo(idCargo) {
    $.ajax({
        url: "controller/cargos/controller_cargo_mensual.php?accion=anular",
        type: "POST",
        data: {
            // accion: "guardar",
            idCargo: idCargo
        },
    }).done(function (resp) {
        if (isNaN(resp)) {
            alert(resp);
        } else {

            if (resp > 0) {
                if (resp == 1) {
                    //si se pudo guardar

                    Swal.fire(
                        "Mensaje de confirmacion",
                        "Cargo anulado correctamente",
                        "success"
                    );

                    tablaMantenimientoCargo.ajax.reload();
                } else if (resp == 5) {
                    return Swal.fire("Mensaje de advertencia", "El cargo no se puede anular, ya que algunos depositos estan registrados con este cargo", "warning");
                } else if (resp == 6) {
                    return Swal.fire("Mensaje de advertencia", "El numero de referencia ya existe", "warning");
                }
            } else {
                Swal.fire("Mensaje de advertencia", "La peticion no se pudo completar", "warning");
            }

        }
    });
}

/**************************************************************************************************************************/
function permitirGuardarCargo(fecha, monto, descripcion) {
    let mensaje = "";

    if (validarVacio(fecha)) {
        mensaje = "La fecha del cargo no puede estar vacia";
    } else if (validarVacio(monto)) {
        mensaje = "El monto no puede estar vacio";
    } else if (!es_numero(monto)) {
        mensaje = "El monto debe ser un numero";
    } else if (validarVacio(descripcion)) {
        mensaje = "La descripcion del cargo no puede estar vacia";
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
