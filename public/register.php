<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.min.css">

  <link href="/css/style.css" rel="stylesheet">
</head>

<body class="body-registro">
  <main class="contenedor-registro">
    <form action="" method="post">
      <section class="seccion-registro">
        <div class="col-lg-8 col-12 mx-auto">
          <?php
          include '../db/conexion.php';
          include '../controllers/controlador_registro.php';
          ?>
          <div class="contenedor_titulo_registro">
            <a href="../index.php"><i class="bi bi-arrow-left-circle-fill registro__icono"></i></a>
            <h3 class="registro__titulo">Registrarse</h3>
          </div>
          <div class="mb-4">
            <p class="registro__texto mb-0 h6">Nombre Completo</p>
            <input class="form-control mt-0 registro_campo" type="text" name="nombre" required>
          </div>
          <div class="mb-4">
            <p class="registro__texto mb-0 h6">Correo Electronico</p>
            <input class="form-control mt-0 registro_campo" type="email" name="correo" required>
          </div>
          <div class="mb-4">
            <p class="registro__texto mb-0 h6">Crear usuario</p>
            <input class="form-control mt-0 registro_campo" type="text" name="usuario" required>
          </div>
          <div class="mb-4">
            <p class="registro__texto mb-0 h6">Crear Contraseña</p>
            <input class="form-control mt-0 registro_campo" type="password" name="nueva-contraseña" required>
          </div>
          <div class="mb-4">
            <p class="registro__texto mb-0 h6">Confirmar Contraseña</p>
            <input class="form-control mt-0 registro_campo" type="password" name="conf-contraseña" required>
          </div>
          <div class="d-flex justify-content-center">
            <input class="registro__boton" id="confirmar" type="submit" name="enviar" value="Confirmar">
          </div>
        </div>
      </section><!--Regsitro-->
    </form>


    <section class="imagen-registro">
      <div>
        <img src="../assets/images/gallery/LOGO-REGISTRO.png" alt="ClinicCare">
      </div>
    </section>
  </main>
</body>

</html>