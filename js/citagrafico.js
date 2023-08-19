function fetchCitaData() {
    return fetch('../../controllers/grafico_citaEstado.php')
        .then(response => response.json());
}

// Función para crear el gráfico
async function createCitaChart() {
    const data = await fetchCitaData();
    const estados = data.estados;
    const user = data.user;

    // Configuración del gráfico
    const ctx = document.getElementById("citaChart").getContext("2d");
    const citaChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: estados,
            datasets: [{
                label: "Numero de citas confirmadas, canceladas y por atender",
                data: user,
                backgroundColor: "rgb(22, 89, 83)"
            }]
        },
        options: {
            responsive: false, // Desactivar la adaptación al tamaño
            // Resto de opciones...
        }
    });
}

// Cargar el gráfico cuando la página esté lista
document.addEventListener('DOMContentLoaded', createCitaChart);