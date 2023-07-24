// Obtén una referencia al elemento canvas
const ctx = document.getElementById('myChart').getContext('2d');

// Obtén el nombre del mes actual
var mesActual = obtenerNombreMes(new Date().getMonth());

// Genera los nombres de los meses para los 11 meses siguientes
var nombresMeses = [];
for (var i = 0; i < 11; i++) {
    var indiceMes = (new Date().getMonth() + i + 1) % 12;
    nombresMeses.push(obtenerNombreMes(indiceMes));
}
nombresMeses.unshift(mesActual);

const getData = () => {
    console.log(atob(document.getElementById('myChart').dataset.metadata))
    const metadata = JSON.parse(atob(document.getElementById('myChart').dataset.metadata) || "[]");
    console.log(metadata)
    return {
        months: metadata.map(item => obtenerNombreMes(item.mes - 1)),
        data: metadata.map(item => item.ventas_diarias)
    }
}

// Crea una instancia de Chart.js
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: getData().months,
        datasets: [{
            label: 'Venta mensual S/',
            data: getData().data,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function (value, index, values) {
                        return 'S/ ' + value.toLocaleString('es-PE');
                    }
                }
            }
        },
        plugins: {
            title: {
                display: true,
                text: `VENTAS DE CADA MES DEL AÑO ${new Date().getFullYear()}`,
                position: 'top',
                font: {
                    size: 16,
                    weight: 'bold'
                }
            }
        }
    }
});

function obtenerNombreMes(indiceMes) {
    var meses = [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre'
    ];
    return meses[indiceMes];
}