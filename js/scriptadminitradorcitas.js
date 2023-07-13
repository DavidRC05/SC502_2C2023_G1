// Función para mostrar una alerta de confirmación
function mostrarConfirmacion(mensaje) {
    Swal.fire({
      title: "Confirmación",
      text: mensaje,
      icon: "question",
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        // Acción a realizar si se confirma
        Swal.fire("¡Confirmado!", "La cita ha sido confirmada.", "success");
      }
    });
  }
  
  // Función para mostrar una alerta de cancelación
  function mostrarCancelacion(mensaje) {
    Swal.fire({
      title: "Cancelación",
      text: mensaje,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        // Acción a realizar si se confirma la cancelación
        Swal.fire("¡Cancelada!", "La cita ha sido cancelada.", "success");
      }
    });
  }
  
  // Función para mostrar una alerta de reprogramación
  function mostrarReprogramacion(mensaje) {
    Swal.fire({
      title: "Reprogramación",
      text: mensaje,
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        // Acción a realizar si se confirma la reprogramación
        Swal.fire("¡Reprogramada!", "La cita ha sido reprogramada.", "success");
      }
    });
  }
  
  // Función para mostrar una alerta de modificación
  function mostrarModificacion(mensaje) {
    Swal.fire({
      title: "Modificación",
      text: mensaje,
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        // Acción a realizar si se confirma la modificación
        Swal.fire("¡Modificada!", "La cita ha sido modificada.", "success");
      }
    });
  }
  
  // Función para mostrar una alerta de generación de informe
  function mostrarInforme(mensaje) {
    Swal.fire({
      title: "Generar informe",
      text: mensaje,
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        // Acción a realizar si se confirma la generación de informe
        Swal.fire("¡Informe generado!", "Se ha generado el informe.", "success");
      }
    });
  }
  
  // Función para mostrar una alerta de eliminación
  function mostrarEliminacion(mensaje) {
    Swal.fire({
      title: "Eliminación",
      text: mensaje,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.isConfirmed) {
        // Acción a realizar si se confirma la eliminación
        Swal.fire("¡Eliminada!", "La cita ha sido eliminada.", "success");
      }
    });
  }
  
  // Obtener los botones de las citas
  const confirmarBotones = document.querySelectorAll(".confirmar");
  const cancelarBotones = document.querySelectorAll(".cancelar");
  const reprogramarBotones = document.querySelectorAll(".reprogramar");
  const modificarBotones = document.querySelectorAll(".modificar");
  const generarInformeBotones = document.querySelectorAll(".generar-informe");
  const eliminarBotones = document.querySelectorAll(".eliminar");
  
  // Agregar eventos de clic a los botones
  confirmarBotones.forEach((boton) => {
    boton.addEventListener("click", () => {
      mostrarConfirmacion("¿Estás seguro de que deseas confirmar esta cita?");
    });
  });
  
  cancelarBotones.forEach((boton) => {
    boton.addEventListener("click", () => {
      mostrarCancelacion("¿Estás seguro de que deseas cancelar esta cita?");
    });
  });
  
  reprogramarBotones.forEach((boton) => {
    boton.addEventListener("click", () => {
      mostrarReprogramacion("¿Estás seguro de que deseas reprogramar esta cita?");
    });
  });
  
  modificarBotones.forEach((boton) => {
    boton.addEventListener("click", () => {
      mostrarModificacion("¿Estás seguro de que deseas modificar esta cita?");
    });
  });
  
  generarInformeBotones.forEach((boton) => {
    boton.addEventListener("click", () => {
      mostrarInforme("¿Estás seguro de que deseas generar un informe para esta cita?");
    });
  });
  
  eliminarBotones.forEach((boton) => {
    boton.addEventListener("click", () => {
      mostrarEliminacion("¿Estás seguro de que deseas eliminar esta cita?");
    });
  });