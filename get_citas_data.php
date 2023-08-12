<?php
// Datos de conexión a la base de datos
include 'db/conexion.php';

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT Fecha_y_hora FROM citas;";
$result = mysqli_query($conexion, $sql);

$citasPorMes = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fechaHora = new DateTime($row['Fecha_y_hora']);
        $mes = $fechaHora->format('n'); // Obtener el número del mes

        if (isset($citasPorMes[$mes])) {
            $citasPorMes[$mes]++;
        } else {
            $citasPorMes[$mes] = 1;
        }
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Devolver los datos en formato JSON
$datosCitas = json_encode($citasPorMes);

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
    <title>Gráfico de Citas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Estilos para el gráfico */
        #citasChart {
            width: 50%; /* Ajusta el tamaño del gráfico */
            margin-left: 20%; /* Ajusta la posición a la derecha */
        }
    </style>
</head>
<body>
    <canvas id="citasChart"></canvas>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var datosCitas = <?php echo $datosCitas; ?>;
            var nombreMeses = <?php echo json_encode($nombreMeses); ?>; // Obtener los nombres de los meses
            
            var meses = Object.keys(datosCitas);
            var citasAgendadas = Object.values(datosCitas);
            var labelsMeses = meses.map(function(mes) {
                return nombreMeses[mes]; // Usar el nombre del mes correspondiente
            });

            var ctx = document.getElementById("citasChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labelsMeses, // Usar los nombres de los meses como etiquetas
                    datasets: [
                        {
                            label: "Citas Agendadas",
                            data: citasAgendadas,
                            backgroundColor: "rgb(22, 89, 83)",
                            borderColor: "rgb(22, 89, 83)",
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        });
    </script>
    
</body>
</html>