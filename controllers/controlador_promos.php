<?php
include '../db/conexion.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // Procesar la imagen si se ha subido correctamente
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Obtener el nombre y la ruta temporal del archivo
        $nombreImagen = $_FILES['imagen']['name'];
        $rutaImagenTemp = $_FILES['imagen']['tmp_name'];

        $rutaDestino = '../../assets/images/imagenes_ofertas/' . $nombreImagen;

        if (move_uploaded_file($rutaImagenTemp, $rutaDestino)) {

            $imagen = $rutaDestino;

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error al conectar a la base de datos: " . $conexion->connect_error);
            }

            // Preparar la consulta SQL para insertar los datos en la tabla
            $sql = "INSERT INTO ofertas (titulo, descripcion, imagen, nombre_imagen) VALUES (?, ?, ?, ?)";

            // Preparar la sentencia
            $stmt = $conexion->prepare($sql);

            // Vincular los parámetros con los datos del formulario
            $stmt->bind_param("ssss", $titulo, $descripcion, $imagen, $nombreImagen);

            // Ejecutar la consulta
            if ($stmt->execute() === TRUE) {
                echo '<div class="alert text-center alert-success">Promoción publicada</div>';
            } else {
                echo "Error al publicar la promoción: " . $conexion->error;
            }

            // Cerrar la conexión
            $conexion->close();
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        $imagen = null;
    }
}
?>
