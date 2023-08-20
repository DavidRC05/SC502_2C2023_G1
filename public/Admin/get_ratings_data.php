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