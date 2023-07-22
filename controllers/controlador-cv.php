<?php

include '../db/conexion.php';
if(!empty($_SESSION['id'])){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aplicar'])) {
        // Verificar si el archivo se ha subido correctamente
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
            // Obtener los datos del archivo
            $nombreArchivo = $_FILES['cv']['name'];
            $tipoArchivo = $_FILES['cv']['type'];
            $datosArchivo = file_get_contents($_FILES['cv']['tmp_name']);
            
            // Obtener el ID del usuario desde la sesión
            $userId = $_SESSION['id'];
            
            if ($conexion->connect_error) {
                die("Error en la conexión: " . $conexion->connect_error);
            }
            
            // Preparar y ejecutar la consulta para insertar el registro en la tabla
            $query = "INSERT INTO curriculum (nombre_archivo, user_id, tipo_archivo, datos_archivo) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("siss", $nombreArchivo, $userId, $tipoArchivo, $datosArchivo);
            
            if ($stmt->execute()) {
                // Éxito al guardar el archivo en la base de datos
                echo '<div class="alert text-center alert-success">Curriculum subido, gracias por aplicar</div>';
            } else {
                // Error al guardar el archivo
                echo '<div class="alert text-center alert-danger">Error al subir el archov</div>' . $conexion->error;
            }
            
            // Cerrar la conexión
            $stmt->close();
            $conexion->close();
        } else {
            // Error en la subida del archivo
            echo "Error al subir el archivo.";
        }
    }
} else {
    echo '<div class="alert text-center alert-danger">Debes iniciar sesion primero</div>';
}

?>
