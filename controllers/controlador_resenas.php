<?php
session_start();

include '../db/conexion.php';

// Verificar si el usuario está autenticado
function ocultarSeccionResenas()
{
    echo '<style>.reseñas { display: none; }</style>';
}

if (!empty($_SESSION['id'])) {
    if (isset($_POST['publicar'])) {
        // Obtener los datos del formulario
        $comentario = $_POST['comentario'];
        $rate = $_POST['rate'];
        $idUsuario = $_SESSION['id'];
        $fecha = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL utilizando consultas preparadas
        $sql = "INSERT INTO reseñas (usuario_id, comentario, rate, fecha) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asociar los parámetros y sus tipos
            $stmt->bind_param("isss", $idUsuario, $comentario, $rate, $fecha);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                $_SESSION['reseña_realizada'] = true; // Variable de sesión para indicar que se ha realizado una reseña
                echo '<div class="alert alert-success mensaje" role="alert">Reseña creada</div>';
                ocultarSeccionResenas();
                // Realizar acciones adicionales después de la inserción, si es necesario
                // Por ejemplo, redirigir al usuario a otra página
                // header("Location: otra_pagina.php");
                // exit();
            } else {
                echo "Error al insertar la reseña en la base de datos: " . $stmt->error;
            }

            // Cerrar la consulta preparada
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conexion->error;
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo "";
    }
} else {
    if (isset($_POST['publicar'])) {
        echo '<div class="mensaje" role="alert">Debes iniciar sesion para dejar tu reseña</div>';
    } else {
        echo '';
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Mostrar mensaje al usuario si se ha realizado una reseña
    <?php if (isset($_SESSION['reseña_realizada']) && $_SESSION['reseña_realizada'] === true) : ?>
        Swal.fire({
            icon: 'success',
            title: '¡Gracias por tu reseña!',
            text: 'Tu opinión ha sido registrada correctamente.',
            showConfirmButton: false,
            timer: 3000
        });
        <?php unset($_SESSION['reseña_realizada']); ?> // Limpiar variable de sesión
    <?php endif; ?>
</script>
