<?php
// Realiza la conexión a la base de datos
include '../db/conexion.php';
// Consulta SQL para obtener las nuevas reseñas (puedes adaptarla según tu estructura de base de datos)
$sql = "SELECT r.comentario, r.rate, u.nombre FROM reseñas r INNER JOIN usuarios u ON r.usuario_id = u.id WHERE r.id > ?";
$stmt = $conexion->prepare($sql);

// Obtén el último ID de reseña conocido
$ultimoIDReseñaConocido = isset($_GET['ultimoID']) ? $_GET['ultimoID'] : 0;

// Asocia el parámetro de la consulta preparada
$stmt->bind_param('i', $ultimoIDReseñaConocido);

// Ejecuta la consulta
$stmt->execute();

// Obtiene los resultados de la consulta
$resultado = $stmt->get_result();

// Crea un array para almacenar las nuevas reseñas
$nuevasReseñas = array();

// Recorre los resultados y agrega las nuevas reseñas al array
while ($fila = $resultado->fetch_assoc()) {
    $nuevasReseñas[] = array(
        'nombreCliente' => $fila['nombre'],
        'comentario' => $fila['comentario'],
        'rate' => $fila['rate']
    );
}

// Devuelve las nuevas reseñas como respuesta en formato JSON
echo json_encode($nuevasReseñas);
?>