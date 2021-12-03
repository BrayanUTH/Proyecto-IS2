function registrarDeposito() {
    let txtFecha = $('#txtFecha').val();
    let txtMonto = $('#txtMonto').val();
    let txtAgencia = $('#txtAgencia').val();
    let txtNumeroReferencia = $('#txtNumeroReferencia').val();
    let cboVecino = $('#cboVecino').val();

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
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                document.getElementById('frmRegistroDeposito').reset();
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