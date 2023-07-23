<?php
//                      Servidor     User    Contraseña  Nombre de BD
$conexion = new mysqli("localhost", "root", "Mathi2004!", "clinica");

$conexion->set_charset("utf8");

// Verificar si la conexión fue exitosa
if ($conexion->connect_errno) {
    // Si hay un error en la conexión, se muestra un mensaje de error y se termina el script.
    // El método connect_errno devuelve el número de error de la última operación de conexión.
    // El método connect_error devuelve una descripción del último error de conexión.
    die("Error en la conexión: " . $conexion->connect_error);
}

?>
