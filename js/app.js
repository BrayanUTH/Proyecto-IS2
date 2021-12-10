function printGrafics() {

}


var arregloReportes = [];
var countVisitByMonth;

function cantidadVisitasPorMes() {
    $.ajax({
        url: 'controller/reportes/controller_reporte.php?opcion=countVisitByMonth',
        type: 'POST',
        data: {
            fechaInicio: fechaInicio,
            fechaFin: fechaFin
        }
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
            var ctx = document.getElementById('canvasMesesMasVentas').getContext('2d');
            if (chartMesesMasVentas) {
                chartMesesMasVentas.reset();
                chartMesesMasVentas.destroy();
            }
            chartMesesMasVentas = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Meses con mas ventas',
                        data: cantidad,
                        borderColor: 'rgb(75, 192, 192)',
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {}
            });
        } else {
            var ctx = document.getElementById('canvasMesesMasVentas').getContext('2d');
            if (chartMesesMasVentas) {
                chartMesesMasVentas.reset();
                chartMesesMasVentas.destroy();
            }
            chartMesesMasVentas = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['SIN RESULTADOS.'],
                    datasets: [{
                        label: 'Meses con mas ventas',
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
