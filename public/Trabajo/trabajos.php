<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clinic Care</title>

    <!-- Archivos CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">


    <link href="../../css/styleTrabajo.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">


</head>

<body class="landing is-preload" id="top">

    <main>
        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand mx-auto d-lg-none" href="../../index.php">Clinic Care<strong class="d-block">Expertos
                        en Estetica</strong></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../../index.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php#about">Sobre Nosotros</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php#services">Servicios</a>
                        </li>

                        <?php if (!empty($_SESSION)) : ?>
                            <a class="navbar-brand d-none d-lg-block" href="../../index.php">Clinic Care<strong class="d-block">Expertos en Estetica</strong>
                            </a>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php#reviews">Testimonios</a>
                        </li>

                        <?php if (empty($_SESSION)) : ?>
                            <a class="navbar-brand d-none d-lg-block" href="../../index.php">Clinic Care<strong class="d-block">Expertos en Estetica</strong>
                            </a>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../agendarCitas.php">Agendar Cita</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php#contact">Contacto</a>
                        </li>

                        <?php if (empty($_SESSION)) : ?>
                            <li class="nav-item">
                                <div class="ingresar-login-register me-1">
                                    <a class="nav-link pt-2 pb-2 ps-3 pe-3 text-white ingresar-login-register" href="../login.php">Iniciar sesión</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="ingresar-login-register ">
                                    <a class="nav-link pt-2 pb-2 ps-3 pe-3 text-white ingresar-login-register" href="../register.php">Registro</a>
                                </div>
                            </li>

                        <?php endif; ?>

                        <?php
                        if (!empty($_SESSION)) {
                            switch ($_SESSION['id_cargo']) {
                                case 1:
                                    echo '<div class="dropdown show navbar-text fs-6 position-absolute top-0 end-0 me-3">';
                                    echo '<a class="btn btn-secondary me-3 ingresar text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                    echo $_SESSION['usuario'];
                                    echo '<i class="bi bi-person-fill"></i>';
                                    echo '</a>';

                                    echo '<div class="dropdown-menu desplegar pe-2" aria-labelledby="dropdownMenuLink">';
                                    echo '<div class="contenedor__texto">';
                                    echo '<a class="text-white text-center desplegar__letra " href="../Admin/dashboard.php"><i class="bi bi-file-bar-graph"></i>Administrar</a> <br>';
                                    echo '</div>';
                                    echo '<div class="contenedor__texto">';
                                    echo '<a class="text-white text-center desplegar__letra" href="../../controllers/controlador_cerrar_sesion.php"><i class="bi bi-arrow-bar-left"></i>Cerrar Sesión</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    break;
                                case 2:
                                    echo '<div class="dropdown show navbar-text fs-6 position-absolute top-0 end-0 me-3">';
                                    echo '<a class="btn btn-secondary me-3 ingresar text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                    echo $_SESSION['usuario'];
                                    echo '<i class="bi bi-person-fill"></i>';
                                    echo '</a>';

                                    echo '<div class="dropdown-menu desplegar" aria-labelledby="dropdownMenuLink">';
                                    echo '<div class="contenedor__texto ">';
                                    echo '<a class="text-white desplegar__letra" href="../../controllers/controlador_cerrar_sesion.php"><i class="bi bi-arrow-bar-left"></i>Cerrar Sesión</a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    break;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Banner -->
        <section id="banner">
            <h2>Clinic Care Jobs</h2>
        </section>

        <!-- Main -->

        <section id="job_main" class="container">
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="cards-wrapper">
                            <div class="card">
                                <div class="image-wrapper">
                                    <img src="../../assets/images/trabajo/recp.png" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Recepcionista</h5>
                                    <p class="card-text">¡Únete a nuestro equipo como Recepcionista! Valoramos tu experiencia. 
                                        Ofrecemos salario competitivo y un entorno laboral gratificante. Aplica hoy mismo.</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="Descripcion/recepcionista.php" class="btn-trabajos alt ">Aplicar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card ">
                                <div class="image-wrapper">
                                    <img src="../../assets/images/trabajo/a2.jpeg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Asistente</h5>
                                    <p class="card-text">Vacante de Asistente Disponible: Únete a nuestro equipo como Asistente. Excelente oportunidad para crecer. 
                                        Ambiente de trabajo gratificante. ¡Aplica ahora!</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="Descripcion/asistente.php" class="btn-trabajos">Aplicar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card ">
                                <div class="image-wrapper">
                                    <img src="../../assets/images/trabajo/cm.jpeg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Community Manager</h5>
                                    <p class="card-text">Únete a nosotros como Community Manager. Crea conexiones impactantes en línea. 
                                        Ofrecemos salario competitivo y un entorno laboral gratificante. ¡Aplica hoy!</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="Descripcion/ComunityM.php" class="btn-trabajos">Aplicar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

        </section>




    </main>

    <footer class="site-footer section-padding" id="contact">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 me-auto col-12">
                    <h5 class="mb-lg-4 mb-3">Horarios</h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            Domingo : cerrado
                        </li>

                        <li class="list-group-item d-flex">
                            Lunes, Martes y Jueves
                            <span>8:00 AM - 3:30 PM</span>
                        </li>

                        <li class="list-group-item d-flex">
                            Sabado
                            <span>10:30 AM - 5:30 PM</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0">
                    <h5 class="mb-lg-4 mb-3">Nuestra Clinica</h5>
                    <p class="mt-2"><a href="mailto:cliniccare.cr@gmail.com">cliniccare.cr@gmail.com</a>
                    <p>
                    <p>🇨🇷CC Novacentro-Guadalupe San José</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 ms-auto">
                    <h5 class="mb-lg-4 mb-3">Redes Sociales</h5>
                    <ul class="social-icon">
                        <li><a href="https://www.facebook.com/cliniccarecr/" class="social-icon-link bi-facebook" target="_blank"></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=50672077328" class="social-icon-link bi-whatsapp" target="_blank"></a></li>
                        <li><a href="https://www.instagram.com/cliniccarecr/" class="social-icon-link bi-instagram" target="_blank"></a></li>
                    </ul>

                </div>
                <div class="col-lg-3 col-12 ms-auto mt-4 mt-lg-0">
                    <p class="copyright-text">Copyright © Clinic Care
                </div>
            </div>
            </section>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- JavaScript de jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- JavaScript de Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- JavaScript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>