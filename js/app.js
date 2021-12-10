function printGrafics() {
    cantidadVisitasPorMes();
}


var arregloReportes = [];
var countVisitByMonth;

function cantidadVisitasPorMes() {
    $.ajax({
        url: 'controller/reportes/controller_reporte.php?opcion=countVisitByMonth',
        type: 'POST',
        // data: {
        //     fechaInicio: fechaInicio,
        //     fechaFin: fechaFin
        // }
    }).done(function (resp) {
        arregloReportes = JSON.parse(resp);
        // top10ServiciosMasSolicitados(arregloReportes[1]);

        let data = arregloReportes[0];

        if (data.length > 0) {
            let meses = [];
            let cantidad = [];
    
            for (let i = 0; i < data.length; i++) {
                meses = [...meses, data[i][0]];
                cantidad = [...cantidad, data[i][1]];
            }
            var ctx = document.getElementById('countVisitByMonth').getContext('2d');
            if (countVisitByMonth) {
                countVisitByMonth.reset();
                countVisitByMonth.destroy();
            }
            countVisitByMonth = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Cantidad de visitas por mes!',
                        data: cantidad,
                        borderColor: 'rgb(75, 192, 192)',
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {}
            });
        } else {
            var ctx = document.getElementById('countVisitByMonth').getContext('2d');
            if (countVisitByMonth) {
                countVisitByMonth.reset();
                countVisitByMonth.destroy();
            }
            countVisitByMonth = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['SIN RESULTADOS.'],
                    datasets: [{
                        label: 'Cantidad de visitas por mes!',
                        data: [0],
                        borderColor: 'rgb(75, 192, 192)',
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {}
    
            });
        }
    });
}
