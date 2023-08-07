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
                    <a href="estadisticas.php">Estadisticas</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="promociones.php">Promociones</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="reseñas.php">Reseñas</a>
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
            <?php
            include '../../db/conexion.php';
            include '../../controllers/controlador_promos.php';
            include '../../assets/images/imagenes_ofertas/';
            ?>
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h1 class="text-center mb-3">Publicar Promoción</h1>
                        <div class="d-flex justify-content-center">
                            <form action="" method="post" class="w-50" enctype="multipart/form-data">
                                <p>Titulo</p>
                                <input class="w-100 mb-2" type="text" name="titulo">
                                <p>Descripción</p>
                                <textarea class="w-100 mb-2" name="descripcion"></textarea>
                                <p>Imagen (1200 x 600)</p>
                                <input type="file" name="imagen" accept=".jpg, .webp">
                                <div class="d-flex justify-content-center ">
                                    <input type="submit" class="boton" name="subir" value="Subir">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <h1 class="text-center mb-3">Promociones Activas</h1>
                        <div class="d-flex align-items-center justify-content-center mt-5">
                            <div class="w-75"> <!-- Agregamos un div para controlar el ancho -->
                                <table class="table  table-hover text-center">
                                    <tr class="text-center">
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Imagen</th>
                                        <th>Ver</th>
                                        <th>Eliminar</th>

                                    </tr>
                                    <?php
                                    // Verificar si el usuario está en sesión
                                    if (!empty($_SESSION['id'])) {
                                        // Obtener el ID del usuario desde la sesión
                                        $userId = $_SESSION['id'];

                                        // Consulta SQL para seleccionar los registros del usuario actual
                                        $query = "SELECT * FROM ofertas";
                                        $result = $conexion->query($query);

                                        // Verificar si hay registros para mostrar
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<tr>';
                                                echo '<td>' . $row['titulo'] . '</td>';
                                                echo '<td>' . $row['descripcion'] . '</td>';
                                                echo '<td class="align-middle text-center">';
                                                echo '<img src="' . $row['imagen'] . '" class="img-fluid mx-auto" style="max-width: 100px;">';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<a href="' . urlencode($row['imagen']) . '" target="_blank" class="btn btn-dark btn-sm">Previzualizar</a>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<a href="../../controllers/eliminar_promo.php?archivo=' . urlencode($row['nombre_imagen']) . '" class="btn btn-danger btn-sm ml-2 eliminar-promo">Eliminar</a>';
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            // No hay registros para mostrar
                                            echo '<tr><td colspan="6" class="text-center">No hay promociones activas</td></tr>';
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
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>



        <!--contenido-->
    </main>

    <!-- Agrega SweetAlert y SweetAlert2 AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="../../js/scriptPromos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</body>

</html>