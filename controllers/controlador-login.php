<?php
session_start();
include 'db/conexion.php';

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST['usuario']) and (!empty($_POST['contraseña']))) {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $sql = $conexion->query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'");

        if ($datos = $sql->fetch_object()) {
            $_SESSION['id'] = $datos->id;
            $_SESSION['nombre'] = $datos->nombre;
            $_SESSION['usuario'] = $datos->usuario;
            // Obtener el rol del usuario
            $id_rol = $datos->id_cargo;
            // Almacenar el id_cargo en la variable de sesión
            $_SESSION['id_cargo'] = $id_rol;
            $id_cargo = $_SESSION['id_cargo'];
            // Redirigir según el rol
            switch ($id_rol) {
                case 1: // Administrador
                    header("Location: admin/dashboard.php");
                    break;
                case 2: // Cliente
                    header("Location: ../index.php");
                    break;
                case 3: // Secretario
                    header("Location: dashboard_sec.php");
                    break;
                default:
                    echo '<div class="text-center alert alert-danger text-center">Acceso denegado</div>';
                    break;
            }
        } else {
            echo '<div class="alert text-center alert-danger">Acceso denegado</div>';
        }
    } else {
        echo 'Campos vacíos';
    }
}
