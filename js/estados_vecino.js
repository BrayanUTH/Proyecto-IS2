var tablaMantenimientoVecino;

function listarMantenimientoVecino() {
    tablaMantenimientoVecino = $("#tablaMantenimientoVecino").DataTable({
        dom: 'lftiprB', //Importante para Imprimir los botones, indica la posicion de los botones
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
            "url": "controller/vecinos/controller_mantenimiento_vecinos.php",
        },
        "columns": [
            { "data": "id_vecino" },
            { "data": "Nombre" },
            { "data": "Casa" },
            { "data": "Bloque" },
            { "data": "vehiculos" },
            { "data": "id_anterior" },
            { "defaultContent": "<button class='editar btn btn-primary'><i class='fas fa-user-edit'></i></button>" }
            // { "data": "id_vecino",
            // render: function(data) {
            //     // return `<a href="editar_vecinos.php?id=${data}" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>`;

            // } }

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

$('#tablaMantenimientoVecino').on('click', '.editar', function () {
    var data = tablaMantenimientoVecino.row($(this).parents('tr')).data(); //Detecta a que fila hago click y me captura los datos en la variable data
  
    if (tablaMantenimientoVecino.row(this).child.isShown()) { //Cuando esta en tamaño responsivo
      var data = tablaMantenimientoVecino.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false }); //Para que no se cierre el modal
    $("#modal_editar").modal('show');
    document.querySelector("#txtIdVecino").value = data.id_vecino;
    document.querySelector("#txtNombre").value = data.Nombre;
    document.querySelector("#txtNumeroCasa").value = data.Casa;
    document.querySelector("#txtNumeroBloque").value = data.Bloque;
    document.querySelector("#txtVehiculo").value = data.vehiculos;
  });

  function editarInformacionVecino() {
    var id = document.querySelector('#txtIdVecino').value;
    var nombre = document.querySelector('#txtNombre').value;
    var casa = document.querySelector('#txtNumeroCasa').value;
    var bloque = document.querySelector('#txtNumeroBloque').value;
    var vehiculo = document.querySelector('#txtVehiculo').value;
  
    if (id.length == 0 || nombre.length == 0 || casa.length == 0 || bloque.length == 0 || vehiculo.length == 0 ) {
      Swal.fire('Mensaje de advertencia', 'Llene los campos vacios', 'warning');
    }
  
    $.ajax({
      url: 'controller/vecinos/controller_editar_vecinos.php',
      type: 'POST',
      data: {
        id: id,
        nombre: nombre,
        casa: casa,
        bloque: bloque,
        vehiculo: vehiculo
      }
    }).done(function (resp) {
      if (resp > 0) {  
        if (resp == 1) {
            tablaMantenimientoVecino.ajax.reload();//Recargamos la tabla para ver reflejados los cambios sin necesidad de actualizar el navegador
          $("#modal_editar").modal('hide'); //Desaparecer la ventana modal      
          Swal.fire('Mensaje de confirmacion', 'Datos actualizados correctamente', 'success');
        }
      } else {
        Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
      }
    });
  }
