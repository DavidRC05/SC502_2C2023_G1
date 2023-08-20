<?php
session_start();

// Add your access restriction logic here
if ($_SESSION['id_cargo'] != 1) {
    function ocultarPagina()
    {
        header("Location: about:blank");
        exit;
    }

    ocultarPagina();
}

// Include your database connection here
include '../../db/conexion.php';

// Query to get the count of appointments scheduled by males and females
$sql = "SELECT Sexo, COUNT(*) AS Count FROM citas GROUP BY Sexo;";
$result = mysqli_query($conexion, $sql);

$sexoData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $sexoData[$row['Sexo']] = $row['Count'];
}

// Close the database connection
mysqli_close($conexion);

$labels = array_keys($sexoData);
$data = array_values($sexoData);

// Include your HTML, CSS, and JavaScript code here
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include your head content here -->
</head>

<body>
    <main class="dashboard">
        <div class="contenido-principal d-flex flex-wrap gap-3 ms-5">
            <div>
                <h2 class="text-center mb-3">Comparación de Sexos</h2>
                <div class="d-flex justify-content-center align-items-center mt-5">
                    <canvas id="sexoChart" width="450" height="350"></canvas>
                </div>
            </div>
        </div>
    </main>
    <!-- Include your script tags and JavaScript code here -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("sexoChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: "Cantidad de Citas",
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: "rgb(22, 89, 83)",
                        borderColor: "rgb(22, 89, 83)",
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: false,
                    // Other options...
                },
            });
        });
    </script>
</body>

</html>
