<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas de el adminitrador</title>
    <!-- Tu enlace a tu archivo CSS personalizado -->
    <link rel="stylesheet" href="..\css\styleCitasAdminitrador.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.min.js"></script>

</head>
<body>

<div class="agendar-cita-container">
            <a href="./agendarCitas.php" class="button agendar-cita">Agendar nueva cita</a>
        </div>

    <div class="container">
        <h2>Citas Agendadas adminitrador</h2>
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

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar']) && isset($_POST['id_cita'])) {
          $id_cita = $_POST['id_cita'];

            // Realizar la consulta para eliminar el registro
            $sql = "DELETE FROM citas WHERE Cedula = '$id_cita'";
            if (mysqli_query($conn, $sql)) {
                // El registro se eliminó correctamente
                // Puedes mostrar una alerta con SweetAlert o redirigir a la página principal
                echo "<script>
                        Swal.fire({
                            title: 'Cita eliminada',
                            text: 'La cita ha sido eliminada correctamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            window.location.href = 'agendarCitasAdminitrador.php';
                        });
                    </script>";
            } else {
                // Si ocurre algún error al eliminar el registro, puedes mostrar un mensaje de error
                echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'Error al eliminar la cita. Inténtalo de nuevo más tarde.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    </script>";
            }
        }

        $sql = "SELECT * FROM citas;";
        $result = mysqli_query($conn, $sql);

       
        // Resto del código PHP
        
        if (mysqli_num_rows($result) > 0) {
            while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                <div class="cita">
                    <p><strong>Nombre:</strong> <?php echo $mostrar['Nombre']; ?></p>
                    <p><strong>Apellidos:</strong> <?php echo $mostrar['Apellido']; ?></p>
                    <p><strong>Cedula:</strong> <?php echo $mostrar['Cedula']; ?></p>
                    <p><strong>Telefono:</strong> <?php echo $mostrar['Telefonos']; ?></p>
                    <p><strong>Fecha y hora cita:</strong> <?php echo $mostrar['Fecha_y_hora']; ?></p>
                    <p><strong>Servicio:</strong> <?php echo $mostrar['Servicio']; ?></p>
                    
                    
        
                    <div class="cita-actions">
                    
                    <button class="button confirmar">Confirmar</button>
                    
                    

                    
                    <a href="../fpdf/PruebaV.php?id_cita=<?php echo $mostrar['Cedula']; ?>" target="_blank" class="button generar-informe"><i class="fas fa-file-pdf"></i> Generar reporte</a>
                    
                    
                    <form method="post" action="">
                    
                            <input type="hidden" name="id_cita" value="<?php echo $mostrar['Cedula']; ?>">
                            <button type="submit" class="button eliminar" name="eliminar">Eliminar</button>
                            <a href="editar.php?cedula=<?php echo $mostrar['Cedula']; ?>" class="button modificar">Modificar</a>
                            
                        </form>
                    </div>
                </div>

                
                
                <?php
            }
        } else {
            echo "No hay datos para mostrar.";
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conn);
        ?>
        
    </div>
    <div class="form-group">
        <a href="../index.php" class="button">Volver al menú principal</a>

    </div>

    
    <script src="../js/scriptCitasAdminitrador.js"></script>
    
</body>
</html>