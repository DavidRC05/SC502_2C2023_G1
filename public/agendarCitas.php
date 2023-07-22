<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reserva de cita con nosotros</title>
    <link href="..\css\style.css" rel="stylesheet">
    <link rel="stylesheet" href="..\css\Stylecitas.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/scriptCitas.js"></script>

    <!-- Archivos CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.min.css">

    <!-- Biblioteca Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  
  </head>

  <body>
    <body id="top">
      <main>
          <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
              <div class="container">
                  <a class="navbar-brand mx-auto d-lg-none" href="index.php">Clinic Care<strong class="d-block">Expertos
                          en Estetica</strong></a>
  
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
  
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav mx-auto">
                          <li class="nav-item active">
                              <a class="nav-link" href="../index.php">Inicio</a>
                          </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="#about">Sobre Nosotros</a>
                          </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="#services">Servicios</a>
                          </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="#reviews">Testimonios</a>
                          </li>
  
                          <a class="navbar-brand d-none d-lg-block" href="../index.php">Clinic Care<strong
                              class="d-block">Expertos en Estetica</strong>
                          </a>
  
                          <li class="nav-item">
                              <a class="nav-link" href="./agendarCitas.php">Agendar Cita</a>
                          </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="#contact">Contacto</a>
                          </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="./login.html">Login</a>
                          </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="./register.html">Registro</a>
                          </li>
                      </ul>
                  </div>
  
              </div>
          </nav>
    
      
      <form id="booking-form" action="" method="POST">

        <div class="container">
          <div class="image">
            <img src="https://scontent.fsyq7-1.fna.fbcdn.net/v/t39.30808-6/359486670_647836254034915_4297196808255674781_n.jpg?_nc_cat=107&cb=99be929b-59f725be&ccb=1-7&_nc_sid=730e14&_nc_ohc=dy0lIJxpdnMAX-bHuYh&_nc_ht=scontent.fsyq7-1.fna&oh=00_AfD38XVRonAy82L_hIbo9lvD-Rru1YcYiYYrRDKlMd6IgQ&oe=64BAE082" alt="Equipo Clinic Care">
          </div>
          <div class="form-title">
            <h2>Agenda tu cita</h2>
          </div>

          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
          </div>

          <div class="form-group">
            <label for="last-name">Apellidos:</label>
            <input type="text" id="last-name" name="last-name" required>
          </div>

          <div class="form-group">
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>
          </div>

          <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="tel" id="phone" name="phone" required>
          </div>

          <div class="form-group">
            <label for="datetime">Fecha y Hora de cita:</label>
            <input type="text" id="datetime" name="datetime" required>
            
          </div>

          <div class="form-group">
            <label for="service">Servicio:</label>
            <select id="service" name="service" required>
              <option value="">Seleccionar un servicio</option>
              <option value="Servicio 1">Servicio 1</option>
              <option value="Servicio 2">Servicio 2</option>
              <option value="Servicio 3">Servicio 3</option>
              <option value="Servicio 4">Servicio 4</option>
            </select>
          </div>
      
          <button type="submit" id="agendar-cita">Agendar cita</button>
          <button type="button" id="borrar-datos">Borrar datos</button>
        </div>
      
      </form>
    </main>

    <!-- Biblioteca Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script>
      flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
      });
    </script>
  </body>
</html>




<?php

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinica";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}




// Función para verificar si una cadena contiene solo letras y espacios
function esSoloLetras($cadena)
{
    return preg_match('/^[A-Za-z ]+$/', $cadena);
}

// Función para verificar si una cadena contiene solo números
function esSoloNumeros($cadena)
{
    return is_numeric($cadena);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'] ?? '';
    $apellido = $_POST['last-name'] ?? '';
    $cedula = $_POST['cedula'] ?? '';
    $telefonos = $_POST['phone'] ?? '';
    $fechaHora = $_POST['datetime'] ?? '';
    $servicio = $_POST['service'] ?? '';

    // Validar nombre y apellido: Permitir solo letras y espacios
    if (!esSoloLetras($nombre) || !esSoloLetras($apellido)) {
        echo "Por favor, ingresa solo letras y espacios en el nombre y apellido.";
        echo '<script>
        alert("Por favor, ingresa solo letras y espacios en el nombre y apellido.");
        window.location.href = "agendarCitas.php";
      </script>';
    }
    // Validar cedula y telefono: Permitir solo números
    elseif (!esSoloNumeros($cedula) || !esSoloNumeros($telefonos)) {
        
        echo '<script>
        alert("Por favor, ingresa solo números en la cédula y teléfono.");
        window.location.href = "agendarCitas.php";
      </script>';
    } else {
        // Verificar si la fecha y hora de la cita ya existe en la base de datos
        $consulta = "SELECT * FROM citas WHERE Fecha_y_hora = '$fechaHora'";
        $result = $conn->query($consulta);

        if ($result->num_rows > 0) {
            // La fecha y hora de la cita ya está ocupada
            echo '<script>
        alert("La fecha ya esta ocupada selecione otra fecha.");
        window.location.href = "agendarCitas.php";
      </script>';
        } else {
            // Insertar la cita en la base de datos
            $sql = "INSERT INTO citas (Nombre, Apellido, Cedula, Telefonos, Fecha_y_hora, Servicio)
                VALUES ('$nombre', '$apellido', '$cedula', '$telefonos', '$fechaHora', '$servicio')";
if ($conn->query($sql) === TRUE) {
  // Cita agendada con éxito, mostrar mensaje y redirigir con JavaScript
  echo '<script>
        alert("Cita agendada con éxito.");
        window.location.href = "agendarCitas.php";
      </script>';
} else {
  // Error al agendar la cita
  echo "Error al agendar la cita: " . $conn->error;
}
        }
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

?>





