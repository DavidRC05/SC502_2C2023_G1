<?php
// Datos de conexión a la base de datos
include '../../db/conexion.php';

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT AVG(rate) AS average_rating FROM reseñas;";
$result = mysqli_query($conexion, $sql);

$row = mysqli_fetch_assoc($result);
$averageRating = $row['average_rating'];

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Devolver los datos en formato JSON
$ratingData = json_encode($averageRating);
?>

<?php
// Datos de conexión a la base de datos
include '../../db/conexion.php';

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT MONTH(fecha) AS mes, AVG(rate) AS average_rating FROM reseñas GROUP BY mes;";
$result = mysqli_query($conexion, $sql);

$averageRatingsPerMonth = array();

while ($row = mysqli_fetch_assoc($result)) {
    $mes = $row['mes'];
    $averageRating = $row['average_rating'];

    $averageRatingsPerMonth[$mes] = $averageRating;
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Devolver los datos en formato JSON
$averageRatingsData = json_encode($averageRatingsPerMonth);

$nombreMeses = array(
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Septiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre'
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Calificación Promedio por Mes</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Estilos para el gráfico */
        #ratingsChart {
            width: 50%;
            /* Ajusta el tamaño del gráfico */
            margin-left: 20%;
            /* Ajusta la posición a la derecha */
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <canvas id="ratingsChart" width="450" height="350"></canvas>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var averageRatingsData = <?php echo $averageRatingsData; ?>;
            var nombreMeses = <?php echo json_encode($nombreMeses); ?>;
            
            var meses = Object.keys(averageRatingsData);
            var averageRatings = Object.values(averageRatingsData);
            var labelsMeses = meses.map(function(mes) {
                return nombreMeses[mes];
            });

            var ctx = document.getElementById("ratingsChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labelsMeses,
                    datasets: [{
                        label: "Promedio De Estrellas",
                        data: averageRatings,
                        backgroundColor: "rgb(22, 89, 83)",
                        borderColor: "rgb(22, 89, 83)",
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 5,
                            stepSize: 1,
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>
