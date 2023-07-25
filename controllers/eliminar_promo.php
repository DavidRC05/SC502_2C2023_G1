<?php
include '../db/conexion.php';

// Paso 2: Verificar si se ha proporcionado el nombre del archivo a eliminar a través de la variable GET 'archivo'
if (isset($_GET['archivo'])) {
    $nombreArchivo = $_GET['archivo'];

    // Paso 3: Eliminar el registro de la promoción de la base de datos
    $sql = "DELETE FROM ofertas WHERE nombre_imagen = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombreArchivo);

    if ($stmt->execute()) {
        // Paso 4 (opcional): Eliminar el archivo físicamente del servidor (si está almacenado en una carpeta)
        $rutaArchivo = '../assets/images/imagenes_ofertas/' . $nombreArchivo;

        // Convertir la ruta relativa en una ruta absoluta
        $rutaAbsoluta = realpath($rutaArchivo);

        if (file_exists($rutaAbsoluta)) {
            unlink($rutaAbsoluta);
        }

        // Redirigir a la página de promociones después de eliminar
        header('Location: ../public/Admin/promociones.php');
        exit();
    } else {
        // Mostrar un mensaje de error en caso de fallo
        echo "Error al eliminar la promoción: " . $conexion->error;
    }
}
