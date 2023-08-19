<?php
include '../db/conexion.php';

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT cita_id, Nombre, Apellido, Fecha_y_hora FROM citas WHERE Estado = 'confirmado'";
$result = $conexion->query($sql);

$eventos = array();

while ($row = $result->fetch_assoc()) {
    $evento = array(
        'id' => $row['cita_id'],
        'title' => $row['Nombre'] . ' ' . $row['Apellido'],
        'start' => $row['Fecha_y_hora']
    );
    array_push($eventos, $evento);
}

$conexion->close();

// Devuelve los eventos en formato JSON
header('Content-Type: application/json');
echo json_encode($eventos);
?>
