var tablaMantenimientoUsuario;

function listarMantenimientoUsuario() {
    tablaMantenimientoUsuario = $("#tablaMantenimientoUsuario").DataTable({
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
            "url": "controller/usuarios/controller_mantenimiento_usuarios.php",
        },
        "columns": [
            { "data": "id_usuario" },
            { "data": "usuario" },
            { "data": "password" },
            { "defaultContent": "<button class='editar btn btn-primary'><i class='fas fa-user-edit'></i></button>" }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        select: true
    });
}

$('#tablaMantenimientoUsuario').on('click', '.editar', function () {
    var data = tablaMantenimientoUsuario.row($(this).parents('tr')).data();

    if (tablaMantenimientoUsuario.row(this).child.isShown()) {
        var data = tablaMantenimientoUsuario.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false });
    $("#modal_editar").modal('show');
    document.querySelector("#txtIdUsuario").value = data.id_usuario;
    document.querySelector("#txtUsuario").value = data.usuario;
    document.querySelector("#txtPassword").value = data.password;
});

function editarUsuario() {
    var id = document.querySelector('#txtIdUsuario').value;
    var username = document.querySelector('#txtUsuario').value;
    var password = document.querySelector('#txtPassword').value;

    if (id.length == 0 || username.length == 0 || password.length == 0) {
        Swal.fire('Mensaje de advertencia', 'Llene los campos vacios', 'warning');
    }

    $.ajax({
        url: 'controller/usuarios/controller_editar_usuario.php',
        type: 'POST',
        data: {
            id: id,
            username: username,
            password: password
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                tablaMantenimientoUsuario.ajax.reload();//Recargamos la tabla para ver reflejados los cambios sin necesidad de actualizar el navegador
                $("#modal_editar").modal('hide'); //Desaparecer la ventana modal      
                Swal.fire('Mensaje de confirmacion', 'Datos actualizados correctamente', 'success');
            }
        } else {
            Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
        }
    });
}

function abrirModal() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false });
    $("#modal_registro").modal('show');
}