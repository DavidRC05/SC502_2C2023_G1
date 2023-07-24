<?php
 include '../db/conexion.php';
if (isset($_GET['archivo'])) {
    $archivoEliminar = $_GET['archivo'];
    
    // Directorio donde se almacenan los archivos
    $directorioArchivos = '../public/Admin/archives/';
    
    // Ruta completa del archivo a eliminar
    $rutaArchivo = $directorioArchivos . $archivoEliminar;
    
    // Verificar que el archivo existe y eliminarlo
    if (file_exists($rutaArchivo) && unlink($rutaArchivo)) {
        $query = "DELETE FROM curriculum WHERE nombre_archivo = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $archivoEliminar);
        
        if ($stmt->execute()) {
            // Éxito al eliminar el archivo y el registro de la base de datos
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            // Error al eliminar el registro de la base de datos
            $response = array('success' => false);
            echo json_encode($response);
        }

        // Cerrar la conexión
        $stmt->close();
    } else {
        $response = array('success' => false);
        echo json_encode($response);
    }
} else {
    $response = array('success' => false);
    echo json_encode($response);
}
?>
