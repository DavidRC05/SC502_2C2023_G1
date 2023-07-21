<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Citas de el adminitrador</title>
    <link rel="stylesheet" href="../css/styleCitasAdminitrador.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>
    <div class="container">
      <h2>Citas Agendadas adminitrador</h2>

      <div class="citas-list">
        <div class="cita" id="cita-1">
          <div class="cita-info">
            <p><strong>Fecha:</strong> 10 de julio, 2023</p>
            <p><strong>Hora:</strong> 10:00 AM</p>
            <p><strong>Nombre:</strong> Juan Pérez</p>
            <p><strong>Servicio:</strong> Servicio 1</p>
            <p><strong>Mensaje:</strong> Ocupo esta cita urgentemente</p>
          </div>
          <div class="cita-actions">
            <button class="button confirmar">Confirmar</button>
            <button class="button cancelar">Cancelar</button>
            <button class="button reprogramar">Reprogramar</button>
            <button class="button modificar">Modificar</button>
            <button class="button generar-informe">Generar un informe</button>
            <button class="button eliminar">Eliminar</button>
          </div>
        </div>
        <div class="cita" id="cita-2">
          <div class="cita-info">
            <p><strong>Fecha:</strong> 15 de julio, 2023</p>
            <p><strong>Hora:</strong> 11:00 AM</p>
            <p><strong>Nombre:</strong> María López</p>
            <p><strong>Servicio:</strong> Servicio 2</p>
            <p><strong>Mensaje:</strong> Ayuda con mi servicio por favor</p>
          </div>
          <div class="cita-actions">
            <button class="button confirmar">Confirmar</button>
            <button class="button cancelar">Cancelar</button>
            <button class="button reprogramar">Reprogramar</button>
            <button class="button modificar">Modificar</button>
            <button class="button generar-informe">Generar un informe</button>
            <button class="button eliminar">Eliminar</button>
          </div>
        </div>
      </div>
      <div class="agendar-cita-container">
        <a href="./agendarCitas.php" class="button agendar-cita"
          >Agendar nueva cita</a
        >
      </div>
    </div>

    <div class="form-group">
      <a href="../index.php" class="button">Volver al menú principal</a>
    </div>
    <script src="../js/scriptCitasAdminitrador.js"></script>
  </body>
</html>