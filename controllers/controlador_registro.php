<?php
require '../db/conexion.php';

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['nueva-contraseña'];
    $confirmarContraseña = $_POST['conf-contraseña'];
    $email = $_POST['correo'];
    $edad = $_POST['edad'];

    if ($contraseña === $confirmarContraseña) {
        // Verificar si el usuario y correo ya existen en la base de datos
        $consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $consultaEmail = "SELECT * FROM usuarios WHERE email = '$email'";

        $resultadoUsuario = $conexion->query($consultaUsuario);
        $resultadoEmail = $conexion->query($consultaEmail);

        if ($resultadoUsuario->num_rows > 0) {
            echo '<div class="text-center alert alert-danger text-center">El usuario ya existe</div>';
        } elseif ($resultadoEmail->num_rows > 0) {
            echo '<div class="text-center alert alert-danger text-center">El correo electrónico ya está registrado</div>';
        } else {
            // Insertar el registro en la base de datos
            $sql = "INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo, email, edad) VALUES ('$nombre', '$usuario', '$contraseña', 2, '$email','$edad')";

            if ($conexion->query($sql) === TRUE) {
                // Obtener el id_cargo del usuario recién registrado
                $id_cargo = $conexion->insert_id;

                // Asignar el valor de id_cargo a $_SESSION['id_cargo']
                $_SESSION['id_cargo'] = $id_cargo;

                echo "Registro exitoso";
                // Redirigir a otra página
                header("Location: login.php");
                exit;
            } else {
                echo "Error al registrar el usuario: " . $conexion->error;
            }
        }
    } else {
        echo '<div class="text-center alert alert-danger text-center">Las contraseñas no coinciden</div>';
    }
}
?>