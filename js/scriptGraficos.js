// Función para obtener datos desde el servidor
function fetchAgeData() {
    return fetch('../../controllers/grafico_edad.php')
        .then(response => response.json());
}

// Función para crear el gráfico
async function createAgeChart() {
    const data = await fetchAgeData();
    const ageRanges = data.ageRanges;
    const userCounts = data.userCounts;

    // Configuración del gráfico
    const ctx = document.getElementById("ageChart").getContext("2d");
    const ageChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ageRanges,
            datasets: [{
                label: "Usuarios por Rango de Edad",
                data: userCounts,
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
document.addEventListener('DOMContentLoaded', createAgeChart);


