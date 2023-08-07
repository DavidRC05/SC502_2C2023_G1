<?php
include '../db/conexion.php';

// Consulta SQL para obtener la cantidad de usuarios en cada rango de edades mayores de 18
$query = "
    SELECT
        CASE
            WHEN edad >= 18 AND edad <= 30 THEN '18-30'
            WHEN edad > 30 AND edad <= 40 THEN '31-40'
            WHEN edad > 40 AND edad <= 50 THEN '41-50'
            ELSE '51+'
        END AS age_range,
        COUNT(*) AS user_count
    FROM usuarios
    WHERE edad >= 18
    GROUP BY age_range
    ORDER BY age_range;
";

$resultado = $conexion->query($query);

// Arreglos para almacenar los datos del gráfico
$ageRanges = [];
$userCounts = [];

// Procesar los resultados de la consulta
while ($fila = $resultado->fetch_assoc()) {
    $ageRanges[] = $fila['age_range'];
    $userCounts[] = (int) $fila['user_count'];
}

// Crear un arreglo asociativo con los datos para el gráfico
$data = [
    'ageRanges' => $ageRanges,
    'userCounts' => $userCounts
];

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar la conexión a la base de datos
$conexion->close();

?>
