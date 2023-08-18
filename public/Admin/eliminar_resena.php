<?php
include '../../db/conexion.php';

if (isset($_GET['id'])) {
    $idResena = $_GET['id'];

    $sql = "DELETE FROM reseñas WHERE id = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $idResena);
        if ($stmt->execute()) {
            header("Location: reseñas.php");
            exit();
        } else {
            echo "Error al eliminar la reseña: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
}
