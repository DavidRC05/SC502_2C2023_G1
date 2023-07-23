<?php
session_start();

if ($_SESSION['id_cargo'] != 1) {
    function ocultarPagina()
    {
        header("Location: about:blank");
        exit;
    }

    ocultarPagina();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Archivos CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.min.css" />
    <link rel="stylesheet" href="../../css/dashboard.css" />
</head>

<body>
    <main class="dashboard">
        <div class="contenido-sidebar">
            <?php if (!empty($_SESSION)) : ?>
                <div class="navbar-text fs-6 position-absolute top-0 end-0 sesion p-2 m-2">
                    <?php echo $_SESSION['usuario']; ?>
                    <i class="bi bi-person-fill"></i>
                </div>
            <?php endif; ?>
            <div class="contenedor-imagen-dash">
                <img class="imagen-dashboard" src="../../assets/images/gallery/Logo-dashboard.png" alt="" />
            </div>
            <aside class="sidebar">
                <div class="enlace-sidebar">
                    <a href="agendarCitasAdminitrador.php">Administracion de Citas</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="calendario.php">Calendario</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="#">Estadisticas</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="#">Inventario</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="#">Reseñas</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="curriculums.php">Aplicaciones a Trabajo</a>
                </div>

            </aside>
            <div class="dash-bajo">
                <a class="text-white" href="../../index.php">Salir <i class="bi bi-box-arrow-right text-white"></i></a>
            </div>
        </div>
        <!--sidebar-->

        <div class="contenido-principal">
            <h1 class="text-center">Aplicaciones de Trabajo</h1>
            <div class="d-flex align-items-center justify-content-center mt-5">
                <div class="w-75"> <!-- Agregamos un div para controlar el ancho -->
                    <table class="table  table-hover">
                        <tr>
                            <th>Nombre del Usuario</th>
                            <th>Nombre del Archivo</th>
                            <th>Tipo de Archivo</th>
                            <th>Acciones</th>
                        </tr>
                        <?php
                        include '../../db/conexion.php';
                        include '../../controllers/controlador-cv.php';
                        // Verificar si el usuario está en sesión
                        if (!empty($_SESSION['id'])) {
                            // Obtener el ID del usuario desde la sesión
                            $userId = $_SESSION['id'];

                            // Consulta SQL para seleccionar los registros del usuario actual
                            $query = "SELECT c.id, u.nombre AS nombre, c.nombre_archivo, c.tipo_archivo FROM curriculum 
                            c INNER JOIN usuarios u ON c.user_id = u.id";
                            $result = $conexion->query($query);

                            // Verificar si hay registros para mostrar
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['nombre'] . '</td>';
                                    echo '<td>' . $row['nombre_archivo'] . '</td>';
                                    echo '<td>' . $row['tipo_archivo'] . '</td>';
                                    echo '<td>';
                                    echo '<a href="#" class="btn btn-primary btn-sm">Descargar CV</a>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<a href="#" class="btn btn-danger btn-sm ml-2">Eliminar</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                // No hay registros para mostrar
                                echo '<tr><td colspan="5" class="text-center">No hay aplicaciones de trabajo.</td></tr>';
                            }
                        } else {
                            // El usuario no ha iniciado sesión
                            echo '<tr><td colspan="5" class="text-center">Debes iniciar sesión primero para ver tus aplicaciones de trabajo.</td></tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>



        <!--contenido-->
    </main>
</body>

</html>