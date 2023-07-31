<?php
session_start();

if ($_SESSION['id_cargo'] != 1) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.min.js"></script>
    <link rel="stylesheet" href="../../css/styleCitasAdminitrador.css" />
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
                <div class="enlace-sidebar">
                    <a href="agendarCitasAdminitrador.php">Administracion de Citas</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="calendario.php">Calendario</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="estadisticas.php">Estadisticas</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="promociones.php">Promociones</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="#">Reseñas</a>
                </div>
                <div class="enlace-sidebar">
                    <a href="curriculums.php">Aplicaciones a Trabajo</a>
                </div>

            </aside>
            <div class="dash-bajo">
                <a class="text-white" href="../../index.php">Salir <i class="bi bi-box-arrow-right text-white"></i></a>
            </div>
        </div>
        <!--sidebar-->

        <div class="contenido-principal">
            <div class="agendar-cita-container">
                <a href="../agendarCitas.php" class="button agendar-cita">Agendar nueva cita</a>
            </div>

            <div class="container">
                <h2>Citas Agendadas adminitrador</h2>
                <?php
                // Datos de conexión a la base de datos
                include '../../db/conexion.php';

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar']) && isset($_POST['id_cita'])) {
                    $id_cita = $_POST['id_cita'];

                    // Realizar la consulta para eliminar el registro
                    $sql = "DELETE FROM citas WHERE Cedula = '$id_cita'";
                    if (mysqli_query($conexion, $sql)) {
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
                $result = mysqli_query($conexion, $sql);


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




                                <a href="../../fpdf/PruebaV.php?id_cita=<?php echo $mostrar['Cedula']; ?>" target="_blank" class="button generar-informe"><i class="fas fa-file-pdf"></i> Generar reporte</a>


                                <form method="post" action="">

                                    <input type="hidden" name="id_cita" value="<?php echo $mostrar['Cedula']; ?>">
                                    <button type="submit" class="button eliminar" name="eliminar">Eliminar</button>
                                    <a href="../editar.php?cedula=<?php echo $mostrar['Cedula']; ?>" class="button modificar">Modificar</a>

                                </form>
                            </div>
                        </div>



                <?php
                    }
                } else {
                    echo "No hay datos para mostrar.";
                }

                // Cierra la conexión a la base de datos
                mysqli_close($conexion);
                ?>

            </div>
            <div class="form-group">
                <a href="../../index.php" class="button">Volver al menú principal</a>

            </div>


            <script src="../../js/scriptCitasAdminitrador.js"></script>


        </div>
        <!--contenido-->
    </main>
</body>

</html>