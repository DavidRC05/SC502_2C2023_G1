<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clinic Care</title>

    <!-- Archivos CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.min.css">

    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


</head>

<body id="top">
    <main>
        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand mx-auto d-lg-none" href="../index.php">Clinic Care<strong class="d-block">Expertos
                        en Estetica</strong></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Sobre Nosotros</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Servicios</a>
                        </li>

                        <?php if (!empty($_SESSION)) : ?>
                            <a class="navbar-brand d-none d-lg-block" href="../index.php">Clinic Care<strong class="d-block">Expertos en Estetica</strong>
                            </a>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Testimonios</a>
                        </li>

                        <?php if (empty($_SESSION)) : ?>
                            <a class="navbar-brand d-none d-lg-block" href="index.php">Clinic Care<strong class="d-block">Expertos en Estetica</strong>
                            </a>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="./public/agendarCitas.php">Agendar Cita</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Contacto</a>
                        </li>

                        <?php if (empty($_SESSION)) : ?>
                            <li class="nav-item">
                                <div class="ingresar-login-register me-1">
                                    <a class="nav-link pt-2 pb-2 ps-3 pe-3 text-white ingresar-login-register" href="./public/login.php">Iniciar sesión</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <div class="ingresar-login-register ">
                                    <a class="nav-link pt-2 pb-2 ps-3 pe-3 text-white ingresar-login-register" href="./public/register.php">Registro</a>
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
                                    echo '<a class="text-white text-center desplegar__letra" href="public/Admin/dashboard.php"><i class="bi bi-file-bar-graph"></i>Administrar</a> <br>';
                                    echo '</div>';
                                    echo '<div class="contenedor__texto">';
                                    echo '<a class="text-white text-center desplegar__letra" href="controllers/controlador_cerrar_sesion.php"><i class="bi bi-arrow-bar-left"></i>Cerrar Sesión</a>';
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
                                    echo '<div class="contenedor__texto">';
                                    echo '<a class="text-white desplegar__letra" href="controllers/controlador_cerrar_sesion.php"><i class="bi bi-arrow-bar-left"></i>Cerrar Sesión</a>';
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

        <section class="hero" id="hero">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./assets/images/slider/DR.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img src="./assets/images/slider/Team.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="heroText d-flex flex-column justify-content-center bg-white">

                            <h1 class="mt-auto mb-2">
                                Mejor
                                <div class="animated-info">
                                    <span class="animated-item">Rostro</span>
                                    <span class="animated-item">Piel</span>
                                    <span class="animated-item">Vida</span>
                                </div>
                            </h1>

                            <p class="mb-4">En Clinic Care, contamos con un equipo de profesionales altamente
                                capacitados en medicina estética,
                                esteticistas y terapeutas que brindan una atención personalizada.</p>
                            <div class="heroLinks d-flex flex-wrap align-items-center">
                                <a class="custom-link me-4" href="#about" data-hover="Conocer más">Conocer Más</a>
                                <p class="contact-phone mb-0"><i class="bi-phone"></i> +506 7207 7328</p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-12">
                        <h2 class="mb-lg-3 mb-3">Conoce a la Dra.Sosa</h2>

                        <p>La Dra. Martha Sosa H. es una reconocida Médico Cirujano con más de 22 años de experiencia en
                            Medicina Estética y Antiaging. Su amplio conocimiento en el campo se ha
                            fortalecido con un Diplomado de la Florida Medical and Aesthetic International School en
                            Estados Unidos, así como con otros cursos y diplomados en Colombia, Guatemala y Costa Rica.
                        </p>

                        <p>Como Directora Médica de Clinic Care y miembro de la Asociación Científica Costarricense de
                            Longevidad y Medicina Estética, la Dra. Sosa H. se destaca por su dedicación y compromiso
                            con el cuidado de sus pacientes. </p>


                    </div>

                    <div class="col-lg-4 col-md-5 col-12 mx-auto">
                        <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                            <p class="featured-text"><span class="featured-number">+22</span><br> Años de experiencia
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="gallery">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 ps-0 d-flex flex-column">
                        <img src="./assets/images/gallery/ejemplo-tratamiento-cliniccare.jpg" class="img-fluid galleryImage" alt="Clinic Care" title="Clinic Care">
                    </div>

                    <div class="col-lg-6 ps-0 d-flex flex-column">
                        <img src="./assets/images/gallery/Uñas.jpg" class="img-fluid galleryImage" alt="Clinic Care" title="Clinic Care">
                    </div>

                </div>
            </div>
        </section>
        <!--Seccion de Servicios-->
        <section class="section-padding pb-0" id="services">
            <div class="container">
                <div class="row">
                    <h2 class="text-center mb-lg-5 mb-4">Nuestros Servicios</h2>
                    <section id="services" class="d-flex flex-wrap justify-content-center">
                        <div class="service">
                            <img src="./assets/images/servicios/rinomodelacion.jpg" alt="Servicio Rinomodelación">
                            <h3 style="color: #02403A;">Rinomodelación</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, officiis rerum amet
                                saepe esse accusantium.</p>
                            <a class="custom-link" href="#booking" data-hover="Agendar" style="margin-top: 10px;">Agendar</a>
                        </div>
                        <div class="service">
                            <img src="./assets/images/servicios/cosmelan-clinic.jpg" alt="Servicio Cosmelan">
                            <h3 style="color: #02403A;">Cosmelan</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, officiis rerum amet
                                saepe esse accusantium.</p>
                            <a class="custom-link" href="#booking" data-hover="Agendar" style="margin-top: 10px;">Agendar</a>
                        </div>
                        <div class="service">
                            <img src="./assets/images/servicios/Botox.jpg" alt="Servicio Botox">
                            <h3 style="color: #02403A;">Botox</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, officiis rerum amet
                                saepe esse accusantium.</p>
                            <a class="custom-link" href="#booking" data-hover="Agendar" style="margin-top: 10px;">Agendar</a>
                        </div>
                        <div class="service">
                            <img src="./assets/images/servicios/hydrafacial-treatment.webp" alt="Servicio Hydrafacial">
                            <h3 style="color: #02403A;">Hydrafacial</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, officiis rerum amet
                                saepe esse accusantium.</p>
                            <a class="custom-link" href="#booking" data-hover="Agendar" style="margin-top: 10px;">Agendar</a>
                        </div>

                    </section>
                </div>
            </div>
        </section>

        <!--Reviews de la Clinica-->
        <section class="testimonios m-3">
            <h2 class="text-center m-4">¿Qué dicen nuestros clientes?</h2>
            <div id="carouselExampleControls" class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    include 'db/conexion.php';


                    // Consulta SQL para obtener las últimas reseñas insertadas
                    $sql = "SELECT r.comentario, r.rate, u.nombre FROM reseñas r
                    INNER JOIN usuarios u ON r.usuario_id = u.id
                    ORDER BY r.id DESC
                    LIMIT 5"; // Obtén las últimas 5 reseñas

                    $result = $conexion->query($sql);

                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        $active = true;
                        // Recorrer los resultados y generar los elementos del carrusel
                        while ($row = $result->fetch_assoc()) {
                            $nombreCliente = $row['nombre'];
                            $comentario = $row['comentario'];
                            $rate = $row['rate'];

                            // Generar el HTML del item del carrusel
                            echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                            echo '<div class="row d-flex justify-content-center">';
                            echo '<div class="col-lg-8">';
                            echo '<h5 class="mb-3">' . $nombreCliente . '</h5>';
                            echo '<p class="text-muted">';
                            echo '<i class="fas fa-quote-left pe-2"></i>';
                            echo $comentario;
                            echo '<i class="fas fa-quote-right pe-2"></i>';
                            echo '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<ul class="list-unstyled d-flex justify-content-center text-warning mb-0">';

                            // Generar las estrellas del rating
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rate) {
                                    echo '<li><i class="fas fa-star fa-sm"></i></li>';
                                } else {
                                    echo '<li><i class="far fa-star fa-sm"></i></li>';
                                }
                            }

                            echo '</ul>';
                            echo '</div>';

                            $active = false; // Desactivar la clase "active" después del primer item
                        }
                    } else {
                        // Si no hay reseñas, mostrar un mensaje alternativo
                        echo '<div class="carousel-item active">';
                        echo '<div class="row d-flex justify-content-center">';
                        echo '<div class="col-lg-8">';
                        echo '<h5 class="mb-3">No hay reseñas disponibles.</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
            <script>
                // Inicializar el carrusel
                $(document).ready(function() {
                    $('#carouselExampleControls').carousel();
                });
            </script>
        </section>

        <!--Reseñas de la Clinica-->
        <section class="reseñas">
            <?php
            include 'db/conexion.php';
            include 'controllers/controlador_resenas.php';
            ?>
            <h2>¡Danos tu opinion!</h2><br>
            <div class="container-reseñas">
                <div class="post">
                    <div class="text">¡Gracias por tu reseña!</div>
                    <div class="edit">EDITAR</div>
                </div>
                <div class="star-widget">
                    <input type="radio" name="rate" id="rate-5" value="5">
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-4" value="4">
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-3" value="3">
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-2" value="2">
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rate" id="rate-1" value="1">
                    <label for="rate-1" class="fas fa-star"></label>

                    <form method="post">
                        <header></header>
                        <div class="textarea">
                            <textarea cols="30" placeholder="Describe tu experiencia.." name="comentario"></textarea>
                        </div>
                        <div class="btn">
                            <input type="hidden" name="rate" id="rate-hidden">
                            <button onclick="click" type="submit" name="publicar" value="Publicar">Publicar</button>
                        </div>
                    </form>
                </div>

                <script>
                    const radioButtons = document.querySelectorAll('input[name="rate"]');
                    const rateHiddenInput = document.getElementById('rate-hidden');

                    radioButtons.forEach(radioButton => {
                        radioButton.addEventListener('click', () => {
                            rateHiddenInput.value = radioButton.value;
                        });
                    });
                </script>

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
                    <p class="mt-2"><a href="mailto:hello@company.co">hello@company.co</a>
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
                    <a href="public/Trabajo/trabajos.php">Trabaja con nosotros</a>
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
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
    <!-- JavaScript de jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- JavaScript de Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- JavaScript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>
</body>

</html>