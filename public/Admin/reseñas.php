<?php
session_start();

if ($_SESSION['id_cargo'] != 1 && $_SESSION['id_cargo'] != 3) {
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
                <?php if ($_SESSION['id_cargo'] == 3) : ?>
                    <div class="enlace-sidebar">
                        <a href="../agendarCitasSec.php">Administracion de Citas</a>
                    </div>
                <?php else : ?>
                    <div class="enlace-sidebar">
                        <a href="agendarCitasAdminitrador.php">Administracion de Citas</a>
                    </div>
                <?php endif; ?>
                <div class="enlace-sidebar">
                    <a href="calendario.php">Calendario</a>
                </div>
                <?php if ($_SESSION['id_cargo'] == 1) : ?>
                    <div class="enlace-sidebar">
                        <a href="estadisticas.php">Estadisticas</a>
                    </div>
                <?php endif; ?>
                <div class="enlace-sidebar">
                    <a href="promociones.php">Promociones</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="reseñas.php">Reseñas</a>
                </div>
                <?php if ($_SESSION['id_cargo'] == 1) : ?>
                    <div class="enlace-sidebar">
                        <a href="curriculums.php">Aplicaciones a Trabajo</a>
                    </div>
                <?php endif; ?>
            </aside>
            <div class="dash-bajo">
                <a class="text-white" href="../../index.php">Salir <i class="bi bi-box-arrow-right text-white"></i></a>
            </div>
        </div>
        <!--sidebar-->

        <div class="contenido-principal">
            <div class="container">
                <h2 class="text-center">Reseñas de Usuarios</h2>
                <hr>
                <div class="row">
                    <?php
                    include '../../db/conexion.php';
                    $sql = "SELECT r.id, r.comentario, r.rate, u.nombre FROM reseñas r
            INNER JOIN usuarios u ON r.usuario_id = u.id";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Cliente: <?php echo $row['nombre']; ?></h5>
                                        <p class="card-text">Calificación: <?php echo $row['rate']; ?></p>
                                        <p class="card-text">Comentario: <?php echo $row['comentario']; ?></p>
                                        <a href="eliminar_resena.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="confirmarEliminar(event)">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>No hay reseñas disponibles.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <script>
            function confirmarEliminar(event) {
                event.preventDefault(); // Evitar el comportamiento predeterminado del enlace

                Swal.fire({
                    title: '¿Estás seguro de eliminar esta reseña?',
                    text: "Esta acción no se puede deshacer",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = event.target.href; // Redirigir a la URL de eliminación
                    }
                });
            }
        </script>

        <!--contenido-->
    </main>

    <!-- Agrega SweetAlert y SweetAlert2 AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="../../js/scriptCurriculum.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</body>

</html>