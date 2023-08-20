<?php


include '../../db/conexion.php';


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$sql = "SELECT Servicio, COUNT(*) AS citas_por_servicio FROM citas GROUP BY Servicio";
$result = mysqli_query($conexion, $sql);


$citasPorServicio = array();


while ($row = mysqli_fetch_assoc($result)) {
    $servicio = $row['Servicio'];
    $citas = $row['citas_por_servicio'];


    $citasPorServicio[$servicio] = $citas;
}


mysqli_close($conexion);


$citasPorServicioData = json_encode($citasPorServicio);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Citas por Servicio</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
   
        #appointmentsChart {


            width: 50%;
            margin-left: 20%;


        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <canvas id="grafico_citasPorServicio" width="450" height="350"></canvas>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var citasPorServicioData = <?php echo $citasPorServicioData; ?>;
           
            var servicios = Object.keys(citasPorServicioData);
            var citasPorServicio = Object.values(citasPorServicioData);


            var ctx = document.getElementById("grafico_citasPorServicio").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: servicios,
                    datasets: [{
                        label: "Citas por Servicio",
                        data: citasPorServicio,
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
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
