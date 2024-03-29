<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Archivos CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.min.css">

  <link href="../css/style.css" rel="stylesheet">
</head>

<body class="body-login">
  <main>

    <section>
      <form method="post" action="">
        <div class="contenedor-login">
          <div class="login booking-form col-lg-8 col-12 mx-auto">
            <?php
            include '../db/conexion.php';
            include '../controllers/controlador-login.php';

            ?>
            <div class="titulo">
              <a href="../index.php"><i class="bi bi-arrow-left-circle-fill titulo__icono mb-3 mt-3"></i></a>
              <h3 class="color__titulo">Iniciar Sesión</h3>
            </div>
            <div class="mb-4">
              <p class="login__texto mb-0 h5">Usuario</p>
              <input class="form-control mt-0" type="text" name="usuario" required>
            </div>
            <div class="mb-4">
              <p class="login__texto mb-0 h5">Contraseña</p>
              <input class="form-control mt-0" type="password" name="contraseña" required>
            </div>
            <div class="d-flex justify-content-center">
              <input class="login__boton" id="confirmar" type="submit" name="btningresar" value="Confirmar">
            </div>
          </div>
        </div>
      </form>
    </section>

  </main>
</body>

</html>