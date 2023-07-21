<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reserva de cita con nosotros</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

  <!-- Archivos CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.min.css">

  <!-- Biblioteca Flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <link rel="stylesheet" href="../css/Stylecitas.css" />
  <link href="../css/style.css" rel="stylesheet">

</head>

<body class="body-citas">

  <body>
    <main>
      <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
        <div class="container">
          <a class="navbar-brand mx-auto d-lg-none" href="index.php">Clinic Care<strong class="d-block">Expertos
              en Estetica</strong></a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#hero">Inicio</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#about">Sobre Nosotros</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#services">Servicios</a>
              </li>

              <?php if (!empty($_SESSION)) : ?>
                <a class="navbar-brand d-none d-lg-block" href="../index.php">Clinic Care<strong class="d-block">Expertos en Estetica</strong>
                </a>
              <?php endif; ?>

              <li class="nav-item">
                <a class="nav-link" href="#reviews">Testimonios</a>
              </li>

              <?php if (empty($_SESSION)) : ?>
                <a class="navbar-brand d-none d-lg-block" href="../index.php">Clinic Care<strong class="d-block">Expertos en Estetica</strong>
                </a>
              <?php endif; ?>

              <li class="nav-item">
                <a class="nav-link" href="agendarCitas.php">Agendar Cita</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#contact">Contacto</a>
              </li>

              <?php if (empty($_SESSION)) : ?>
                <li class="nav-item">
                  <div class="ingresar-login-register me-1">
                    <a class="nav-link pt-2 pb-2 ps-3 pe-3 text-white ingresar-login-register" href="login.php">Iniciar sesión</a>
                  </div>
                </li>

                <li class="nav-item">
                  <div class="ingresar-login-register ">
                    <a class="nav-link pt-2 pb-2 ps-3 pe-3 text-white ingresar-login-register" href="register.php">Registro</a>
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
                    echo '<a class="text-white text-center desplegar__letra " href="/public/Admin/dashboard.php"><i class="bi bi-file-bar-graph"></i>Administrar</a> <br>';
                    echo '</div>';
                    echo '<div class="contenedor__texto">';
                    echo '<a class="text-white text-center desplegar__letra" href="../controllers/controlador_cerrar_sesion.php"><i class="bi bi-arrow-bar-left"></i>Cerrar Sesión</a>';
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
                    echo '<a class="text-white desplegar__letra" href="../controllers/controlador_cerrar_sesion.php"><i class="bi bi-arrow-bar-left"></i>Cerrar Sesión</a>';
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

      <section class="citas  form-citas">
        <div class="container-citas"><!--form de citas-->
          <div>
            <form id="booking-form" action="procesar_reserva.php" method="POST">
              <div class="form-title">
                <h2>Agenda tu cita</h2>
              </div>

              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="last-name">Apellidos:</label>
                <input type="text" id="last-name" name="last-name" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="datetime">Fecha y Hora de cita:</label>
                <input type="datetime-local" id="datetime" name="datetime" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="service">Servicio:</label>
                <select id="service" name="service" class="form-control" required>
                  <option disabled selected>Seleccionar un servicio</option>
                  <option value="Servicio 1">Rinomodelacion</option>
                  <option value="Servicio 2">Cosmelan</option>
                  <option value="Servicio 3">Botox</option>
                  <option value="Servicio 4">Hydrafacial</option>
                </select>
              </div>
              <div class="botones">
                <button class="boton text-center" type="submit" id="agendar-cita">Agendar cita</button>
                <button class="boton text-center" type="reset" id="borrar-datos">Borrar datos</button>
              </div>
            </form>
          </div>

        </div>


        <div class="image"><!--imagen-->
          <img src="../assets/images/gallery/foto-citas.jpg" alt="Servicios">
        </div>
      </section><!--fin de citas-->

    </main>

    <!-- Biblioteca Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/scriptCitas.js"></script>
    <!-- JavaScript de jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- JavaScript de Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- JavaScript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
      flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
      });
    </script>
  </body>

</html>