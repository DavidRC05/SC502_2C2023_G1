<?php
session_start();

if ($_SESSION['id_cargo'] != 3 && 1) {
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
    <link rel="stylesheet" href="../css/dashboard.css" />
</head>

<body>
    <main class="dashboard">
        <div>
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
                        <a href="../public/agendarCitasSec.php">Administracion de Citas</a>
                    </div>
                    <div class="enlace-sidebar">
                        <a href="admin/calendario.php">Calendario</a>
                    </div>
                    <div class="enlace-sidebar">
                        <a href="admin/promociones.php">Promociones</a>
                    </div>
                    <div class="enlace-sidebar">
                        <a href="admin/reseñas.php">Reseñas</a>
                    </div>
                </aside>
                <div class="dash-bajo">
                    <a class="text-white" href="../index.php">Salir <i class="bi bi-box-arrow-right text-white"></i></a>
                </div>
            </div>
            <!--sidebar-->

            <div>



            </div>
            <!--contenido-->
    </main>
</body>

</html>