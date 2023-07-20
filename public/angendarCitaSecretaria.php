<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Citas de la Secretaria</title>
    <link rel="stylesheet" href="../css/styleCitasSecretaria.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="container">
      <h2>Citas Agendadas Secretaria</h2>
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
            <button class="confirmar">Confirmar</button>
            <button class="cancelar">Cancelar</button>
            <button class="reprogramar">Reprogramar</button>
          </div>
        </div>
        <div class="cita" id="cita-2">
          <div class="cita-info">
            <p><strong>Fecha:</strong> 15 de julio, 2023</p>
            <p><strong>Hora:</strong> 11:00 AM</p>
            <p><strong>Nombre:</strong> María López</p>
            <p><strong>Servicio:</strong> Servicio 2</p>
            <p><strong>Mensaje:</strong> Ayuda con mi servicio porfavor</p>
          </div>
          <div class="cita-actions">
            <button class="confirmar">Confirmar</button>
            <button class="cancelar">Cancelar</button>
            <button class="reprogramar">Reprogramar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <a href="../index.php" class="button">Volver al menú principal</a>
    </div>

    <script src="../js/scriptCitasSecretaria.js"></script>
  </body>
</html>
