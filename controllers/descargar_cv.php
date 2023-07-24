<?php
session_start();
include '../db/conexion.php';
include 'controlador-cv.php';
// Verificar si se ha proporcionado el nombre del archivo a descargar
if (isset($_GET['archivo'])) {
    $archivoDescargar = $_GET['archivo'];
    
    // Directorio donde se almacenan los archivos
    $directorioArchivos = '../public/Admin/archives/';
    
    // Ruta completa del archivo a descargar
    $rutaArchivo = $directorioArchivos . $archivoDescargar;
    
    // Verificar que el archivo existe y se puede descargar
    if (file_exists($rutaArchivo)) {
        // Encabezados para forzar la descarga del archivo
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $archivoDescargar);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($rutaArchivo));
        readfile($rutaArchivo);
        exit;
    } else {
        echo 'El archivo no existe o no se puede descargar.';
    }
} else {
    echo 'Nombre de archivo no proporcionado.';
}
