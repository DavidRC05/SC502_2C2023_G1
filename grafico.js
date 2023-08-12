const chartColor = "rgb(22, 89, 83)"; // Define el color que deseas usar

// Función para obtener datos desde el servidor
function fetchCitasData() {
    return fetch('get_citas_data.php')
        .then(response => response.json());
}

// Función para crear el gráfico de citas
async function createCitasChart() {
    const data = await fetchCitasData();
    const meses = Object.keys(data);
    const citasAgendadas = Object.values(data);

    // Configuración del gráfico
    const ctx = document.getElementById("citasChart").getContext("2d");
    const citasChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: meses,
            datasets: [{
                label: "Citas Agendadas",
                data: citasAgendadas,
                backgroundColor: chartColor, // Usa el color definido
                borderColor: chartColor, // Usa el mismo color para el borde
                borderWidth: 1,
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                title: {
                    display: true,
                    text: "Citas Agendadas por Mes", // Título para el gráfico
                    position: "top", // Posición del título
                },
            },
            layout: {
                padding: {
                    left: 50, // Ajusta el margen izquierdo
                    right: 20, // Ajusta el margen derecho
                },
            },
            responsive: true, // Activar adaptación al tamaño
            maintainAspectRatio: false, // No mantener relación de aspecto
        },
    });
}

// Cargar el gráfico cuando la página esté lista
document.addEventListener("DOMContentLoaded", createCitasChart);