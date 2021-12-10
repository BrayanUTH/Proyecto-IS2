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
     
    { "defaultContent": "<button class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button class='btnVerVecino btn btn-warning'><i class='fa fas fa-eye'></i></button>" },
  
    ],
    "fnRowCallback": function (nRow) {
        $($(nRow).find("td")[5]).css('text-align', 'left');
      },

    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },
    select: true
});
}

$('#btnEditar').hide();
$('#btnAgregar').show();

$('#tablaMantenimientoConvenio').on('click', '.editar', function () {
    
    var data = tablaMantenimientoConvenio.row($(this).parents('tr')).data(); //Detecta a que fila hago click y me captura los datos en la variable data
    
    if (tablaMantenimientoConvenio.row(this).child.isShown()) { //Cuando esta en tamaño responsivo
      var data = tablaMantenimientoConvenio.row(this).data();
    }
    loadData(data);

    $('#btnAgregar').hide();
    $('#btnEditar').show();
  });

  function loadData(data) {
    let { id_convenio,id_vecino,fecha_ultimo_pago,monto_inicial, prima,descuento,saldo_restante,cuotas,descripcion,estado,id_cargo } = data;

    $('#txtMonto').val(monto_inicial);
    $('#txtPrima').val(prima);
    $('#txtDescuento').val(descuento);
    $('#txtSaldo').val(saldo_restante);
    $('#txtCuota').val(cuotas);
    $('#txtDetalles').val(descripcion);
    $('#txtFechaUltimo').val(fecha_ultimo_pago);
    $('#txtIdConvenio').val(id_convenio);

    $("#cboCargo").val(id_cargo).trigger("change");
    $("#cboEstado").val(estado).trigger("change");
    $("#cboVecino").val(id_vecino).trigger("change");
    
    console.log(estado);
  }

function registrarConvenio() {
    let cmbCargo = $('#cboCargo').val();
    let txtMonto= $('#txtMonto').val();
    let txtPrima = $('#txtPrima').val();
    let txtDescuento = $('#txtDescuento').val();
    let txtSaldo = $('#txtSaldo').val();
    let txtCuota = $('#txtCuota').val();
    let txtDetalle = $('#txtDetalles').val();
    let txtFechaUltimo = $('#txtFechaUltimo').val();
    let cmbEstado = $('#cboEstado').val();
    let cboVecino = $('#cboVecino').val();

    if (parseFloat(txtSaldo)<0) {
        return Swal.fire('Mensaje de advertencia', 'El valor del monto inicial no puede ser menor al del saldo', 'warning');
    }

    if (cmbCargo.length == 0 ||txtMonto.length == 0 || txtPrima.length == 0 || txtDescuento.length == 0 || txtSaldo.length == 0 || txtCuota.length == 0 || txtDetalle.length == 0 ||
         txtFechaUltimo.length == 0 ||cboVecino.length == 0 ||cmbEstado.length == 0) {
        return Swal.fire('Mensaje de advertencia', 'Todos los campos son obligatorios', 'warning');
    }

    $.ajax({
        url: 'controller/convenio/controller_convenio.php?opcion=registrar',
        type: 'POST',
        data: {
            cargo: cmbCargo,
            monto: txtMonto,
            prima: txtPrima,
            descuento: txtDescuento,
            saldo: txtSaldo,
            cuota: txtCuota,
            detalle: txtDetalle,
            fechaultimo: txtFechaUltimo,
            estado: cmbEstado,
            vecino: cboVecino,
        }
    }).done(function (resp) {
        
        if (resp > 0) {
            if(resp == 1){
                tablaMantenimientoConvenio.ajax.reload();
                document.getElementById('frmRegistroConvenio').reset();
                Swal.fire('Mensaje de confirmacion', 'Datos guardados correctamente', 'success');
            }   
        } else {
            Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
        }
    }); 
}


function editarConvenio() {
  let cmbCargo = $('#cboCargo').val();
  let txtMonto= $('#txtMonto').val();
  let txtPrima = $('#txtPrima').val();
  let txtDescuento = $('#txtDescuento').val();
  let txtSaldo = $('#txtSaldo').val();
  let txtCuota = $('#txtCuota').val();
  let txtDetalle = $('#txtDetalles').val();
  let txtFechaUltimo = $('#txtFechaUltimo').val();
  let cmbEstado = $('#cboEstado').val();
  let cboVecino = $('#cboVecino').val();
  let idConvenio = $('#txtIdConvenio').val();

 
  if (parseFloat(txtSaldo)<0) {
      return Swal.fire('Mensaje de advertencia', 'El valor del monto inicial no puede ser menor al del saldo', 'warning');
  }

  if (cmbCargo.length == 0 ||txtMonto.length == 0 || txtPrima.length == 0 || txtDescuento.length == 0 || txtSaldo.length == 0 || txtCuota.length == 0 || txtDetalle.length == 0 ||
       txtFechaUltimo.length == 0 ||cboVecino.length == 0 ||cmbEstado.length == 0) {
      return Swal.fire('Mensaje de advertencia', 'Todos los campos son obligatorios', 'warning');
  }

  $.ajax({
      url: 'controller/convenio/controller_convenio.php?opcion=editar',
      type: 'POST',
      data: {
          idConvenio: idConvenio,
          cargo: cmbCargo,
          monto: txtMonto,
          prima: txtPrima,
          descuento: txtDescuento,
          saldo: txtSaldo,
          cuota: txtCuota,
          detalle: txtDetalle,
          fechaultimo: txtFechaUltimo,
          estado: cmbEstado,
          vecino: cboVecino,
      }
  }).done(function (resp) {
      
      if (resp > 0) {
          if(resp == 1){
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

$('#cboCargo').change(function (e) { 
    let id = $('#cboCargo').val();
    let monto = $('#cboCargo .'+id).attr('data-monto');
    $('#txtMonto').val(monto);

  if($('#txtPrima').val()!=""||$('#txtDescuento').val()!=""){
      calcularSaldo();
  }
});



$('.losInput input').on('change', function(){
    calcularSaldo();
  });

function calcularSaldo(){
  var total = 0;
    var resta = $('#txtMonto').val();
    $('.losInput input').each(function() {
      if($( this ).val() != ""){
          
        total += parseFloat($( this ).val());
      }
      
    });
    
    const totalfinal=resta-total;
    $('#txtSaldo').val(totalfinal);
    $('#txtSaldo').val(totalfinal.toFixed(2));
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
                cadena += "<option class='" + data[i]['id_cargo'] + "' data-monto='" + data[i]['monto_cargo'] + "' value='" + data[i]['id_cargo'] + "'>" + data[i]['nombre'] + "</option>";
            }
            document.querySelector('#cboCargo').innerHTML = cadena;
            
        } else {
            document.querySelector('#cboCargo').innerHTML = "No se encontraron datos";
        }
    });
}

