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

    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../css/dashboard.css" />

    <link rel="stylesheet" href="../../css/calendario.css" />
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

        <div class="contenido-principal mt-5">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/locale/es.js"></script>
            <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js "></script>
            <script src="../../js/calendario.js"></script>
        </div>



        <!--contenido-->
    </main>


</body>

</script>
<!-- Agrega SweetAlert y SweetAlert2 AJAX -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</html>