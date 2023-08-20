<html>

<head>
    <title>Editar </title>


    <title>Editar Secretario </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"],
        a {
            display: inline-block;
            padding: 8px 16px;
            background-color: #008080;
            /* Cambia el color del botón a verde oscuro */
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        a:hover {
            background-color: #006666;
            /* Cambia el color del botón en el hover */
        }
    </style>
</head>

<body>
    <?php
    include '../db/conexion.php';

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    if (isset($_POST['enviar'])) {
        // Obtener los nuevos valores del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $telefonos = $_POST['telefonos'];
        $fecha_y_hora = $_POST['Fechayhora'];
        $servicio = $_POST['Servicio'];
        $estado = $_POST['Estado'];

        // Actualizar los datos en la base de datos
        $sql = "UPDATE citas SET Nombre='$nombre', Apellido='$apellido', Telefonos='$telefonos', Fecha_y_hora='$fecha_y_hora', Servicio='$servicio', Estado='$estado' WHERE Cedula='$cedula'";
        if (mysqli_query($conexion, $sql)) {
            // Redirigir a la página principal después de la actualización
            header("Location: .../SC502_2C2023_G1/public/agendarCitasSec.php");
            exit();
        } else {
            echo "Error al actualizar los datos: " . mysqli_error($conexion);
        }
    } else {
        // Si el formulario no se ha enviado, obtener los datos de la base de datos y asignarlos a las variables
        $id_cita = $_GET['cedula'];

        $sql = "SELECT * FROM citas WHERE Cedula = '$id_cita'";
        $resultado = mysqli_query($conexion, $sql);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            $nombre = $fila["Nombre"];
            $apellido = $fila["Apellido"];
            $cedula = $fila["Cedula"];
            $telefonos = $fila["Telefonos"];
            $fecha_y_hora = $fila["Fecha_y_hora"];
            $servicio = $fila["Servicio"];
            $estado = $fila["Estado"];
        } else {
            // Si no se encontró la cita con esa cédula, puedes mostrar un mensaje de error
            echo "Cita no encontrada.";
        }
    }
    ?>
    <!-- El formulario -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <h1>Editar Pacientes</h1>
    <form method="post" action="">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre ?>" class="m-0"> <br>

        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $apellido ?>" class="m-0"> <br>

        <label>Cedula:</label>
        <input type="text" name="cedula" value="<?php echo $cedula ?>" class="m-0"> <br>

        <label>Telefonos:</label>
        <input type="text" name="telefonos" value="<?php echo $telefonos ?>" class="m-0"> <br>

        <label>Fecha_y_hora:</label>
        <input type="text" name="Fechayhora" value="<?php echo $fecha_y_hora ?>" class="m-0"> <br>

        <label>Servicio:</label>
        <input type="text" name="Servicio" value="<?php echo $servicio ?>" class="m-0"> <br>

        <div class="form-group m-0">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="Estado">
                <option value="confirmado" <?php if ($estado === 'confirmado') echo 'selected'; ?>>Confirmado</option>
                <option value="cancelado" <?php if ($estado === 'cancelado') echo 'selected'; ?>>Cancelado</option>
                <option value="atendido" <?php if ($estado === 'atendido') echo 'selected'; ?>>Atendido</option>
            </select>
        </div>

        <div class="mt-3">
            <input type="hidden" name="cedula" value="<?php echo $id_cita; ?>">

            <input type="submit" name="enviar" value="Actualizar">
            <a href=".../SC502_2C2023_G1/public/agendarCitasSec.php" class="text-decoration-none text-white">Regresar</a>
        </div>
    </form>
</body>

</html>