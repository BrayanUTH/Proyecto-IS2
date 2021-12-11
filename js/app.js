function printGrafics() {
    cantidadVisitasPorMes();
}


var arregloReportes = [];
var countVisitByMonth;

function cantidadVisitasPorMes() {
    $.ajax({
        url: 'controller/reportes/controller_reporte.php?opcion=countVisitByMonth',
        type: 'POST',
    }).done(function (resp) {
        arregloReportes = JSON.parse(resp);
        depositosPagosVecin(arregloReportes[1]);
        totalPagosPorCargos(arregloReportes[2]);
        conveniosByMonth(arregloReportes[3]);

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


var depositosPagosVecindal;
function depositosPagosVecin(data) {
    // let ejecutarGraficos = document.querySelector('.wrapper #contenido-principal  #ejecutarGraficos')

    // if (!ejecutarGraficos) {
    //     return;
    // }

    if (data.length > 0) {        
        var ctx = document.getElementById('depositosPagosVecindal').getContext('2d');
        if (depositosPagosVecindal) {
            depositosPagosVecindal.reset();
            depositosPagosVecindal.destroy();
        }
        depositosPagosVecindal = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pagado', 'No Pagado'],
                datasets: [{
                    label: 'Porcentaje en base 100 de depositos pagos por vecino.',
                    data: [data[0], data[1]],
                    backgroundColor: ['rgb(54, 232, 30)', 'rgba(255, 195, 0 )'],
                    borderColor: ['rgb(54, 232, 30)', 'rgba(255, 195, 0 )'],
                    hoverOffset: 4
                }]
            },
            options: {}
        });
    } else {
        var ctx = document.getElementById('depositosPagosVecindal').getContext('2d');
        if (depositosPagosVecindal) {
            depositosPagosVecindal.reset();
            depositosPagosVecindal.destroy();
        }
        depositosPagosVecindal = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['SIN RESULTADOS.'],
                datasets: [{
                    label: 'Porcentaje en base 100 de depositos pagos por vecino',
                    data: [0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {}

        });
    }

} 

var pagosPorCargos;
function totalPagosPorCargos(data) {
    // let ejecutarGraficos = document.querySelector('.wrapper #contenido-principal  #ejecutarGraficos')

    // if (!ejecutarGraficos) {
    //     return;
    // }

    if (data.length > 0) {
        let producto = [];
        let cantidad = [];
        let color = [];

        for (let i = 0; i < data.length; i++) {
            producto = [...producto, data[i][0]];
            cantidad = [...cantidad, data[i][1]];
            color = [...color, colorRGB()];
        }
        var ctx = document.getElementById('pagosPorCargos').getContext('2d');
        if (pagosPorCargos) {
            pagosPorCargos.reset();
            pagosPorCargos.destroy();
        }
        pagosPorCargos = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: producto,
                datasets: [{
                    data: cantidad,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 1
                }]
            },
            options: {}
        });
    } else {
        var ctx = document.getElementById('pagosPorCargos').getContext('2d');
        if (pagosPorCargos) {
            pagosPorCargos.reset();
            pagosPorCargos.destroy();
        }
        pagosPorCargos = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['SIN RESULTADOS.'],
                datasets: [{
                    label: 'Total de pagos por cargos',
                    data: [0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {}

        });
    }
}


var conveniosPorMes;
function conveniosByMonth(data) {
    // let ejecutarGraficos = document.querySelector('.wrapper #contenido-principal  #ejecutarGraficos')

    // if (!ejecutarGraficos) {
    //     return;
    // }

    if (data.length > 0) {
        let producto = [];
        let cantidad = [];
        let color = [];

        for (let i = 0; i < data.length; i++) {
            producto = [...producto, data[i][0]];
            cantidad = [...cantidad, data[i][1]];
            color = [...color, colorRGB()];
        }
        var ctx = document.getElementById('conveniosPorMes').getContext('2d');
        if (conveniosPorMes) {
            conveniosPorMes.reset();
            conveniosPorMes.destroy();
        }
        conveniosPorMes = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: producto,
                datasets: [{
                    label: 'Convenios Iniciados Por Mes',
                    data: cantidad,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } else {
        var ctx = document.getElementById('conveniosPorMes').getContext('2d');
        if (conveniosPorMes) {
            conveniosPorMes.reset();
            conveniosPorMes.destroy();
        }
        conveniosPorMes = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['SIN RESULTADOS.'],
                datasets: [{
                    label: 'Convenios Iniciados Por Mes',
                    data: [0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

}

function generarNumero(numero) {
    return (Math.random() * numero).toFixed(0);
}

function colorRGB() {
    var color = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
    return "rgb" + color;
}

