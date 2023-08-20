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
