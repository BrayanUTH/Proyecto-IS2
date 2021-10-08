function registrarDeposito() {
    let fecha = $('#txtFecha').val();
    let monto = $('#txtMonto').val();

    if (fecha.length == 0 || monto.length == 0) {
        return Swal.fire('Mensaje de advertencia', 'Todos los campos son obligatorios', 'warning');
    }

    $.ajax({
        url: 'controller/controller_registrar_deposito.php',
        type: 'POST',
        data: {
            fecha: fecha,
            monto: monto
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                Swal.fire('Mensaje de confirmacion', 'Datos guardados correctamente', 'success');
            }
        } else {
            Swal.fire('Mensaje de advertencia', 'La actualizacion no se pudo completar', 'warning');
        }
    });
    
}