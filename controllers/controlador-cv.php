<?php
// ... Código anterior ...

if (!empty($_SESSION['id'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aplicar'])) {
        // Verificar si el archivo se ha subido correctamente
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
            // Obtener los datos del archivo
            $nombreArchivo = $_FILES['cv']['name'];
            $tipoArchivo = $_FILES['cv']['type'];
            $rutaArchivoTemporal = $_FILES['cv']['tmp_name'];

            // Obtener el ID del usuario desde la sesión
            $userId = $_SESSION['id'];

            if ($conexion->connect_error) {
                die("Error en la conexión: " . $conexion->connect_error);
            }

            // Carpeta destino para guardar el archivo
            $carpetaDestino = '../../Admin/archives/';
            // Comprobar si la carpeta destino existe, si no, crearla
            if (!file_exists($carpetaDestino)) {
                mkdir($carpetaDestino, 0777, true);
            }

            // Ruta completa donde se guardará el archivo
            $rutaArchivo = $carpetaDestino . $nombreArchivo;

            // Mover el archivo a la carpeta de destino
            if (move_uploaded_file($rutaArchivoTemporal, $rutaArchivo)) {
                // Preparar y ejecutar la consulta para insertar el registro en la tabla
                $query = "INSERT INTO curriculum (nombre_archivo, user_id, tipo_archivo) VALUES (?, ?, ?)";
                $stmt = $conexion->prepare($query);
                $stmt->bind_param("sis", $nombreArchivo, $userId, $tipoArchivo);

                if ($stmt->execute()) {
                    // Éxito al guardar el archivo en la base de datos
                    echo '<div class="alert text-center alert-success">Curriculum subido, gracias por aplicar</div>';
                } else {
                    // Error al guardar el archivo en la base de datos
                    echo '<div class="alert text-center alert-danger">Error al guardar el archivo</div>' . $conexion->error;
                }

                // Cerrar la conexión
                $stmt->close();
            } else {
                // Error al mover el archivo a la carpeta de destino
                echo '<div class="alert text-center alert-danger">Error al subir el archivo.</div>';
            }
        } else {
            // Error en la subida del archivo
            echo '<div class="alert text-center alert-danger">Error al subir el archivo.</div>';
        }
    }
} else {
    echo '<div class="alert text-center alert-danger">Debes iniciar sesión primero</div>';
}
