<?php
include '../db/conexion.php';

// Consulta SQL para obtener la cantidad de usuarios en cada rango de edades mayores de 18
$query = "
SELECT Estado, COUNT(*) AS count FROM citas GROUP BY Estado;
";

$resultado = $conexion->query($query);

// Arreglos para almacenar los datos del gráfico
$estados = [];
$user = [];

// Procesar los resultados de la consulta
while ($fila = $resultado->fetch_assoc()) {
    $estados[] = $fila['Estado'];
    $user[] = (int) $fila['count'];
}

// Crear un arreglo asociativo con los datos para el gráfico
$data = [
    'estados' => $estados,
    'user' => $user
];

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar la conexión a la base de datos
$conexion->close();

?>