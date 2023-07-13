// Función para mostrar una alerta de confirmación
function mostrarConfirmacion(mensaje) {
  Swal.fire({
    title: "Confirmación",
    text: mensaje,
    icon: "question",
    showCancelButton: true,
    confirmButtonText: "Sí",
    cancelButtonText: "No",
    customClass: {
      confirmButton: "swal-confirm-button-green",
      cancelButton: "swal-cancel-button",
    },
  }).then((result) => {
    if (result.isConfirmed) {
      // Acción a realizar si se confirma
      Swal.fire({
        title: "¡Confirmado!",
        text: "La cita ha sido confirmada.",
        icon: "success",
        customClass: {
          popup: "swal-success-popup",
          icon: "swal-success-icon",
        },
      });
      // Cambiar el color del cuadro de cita al confirmar
      const cita = result.target.closest(".cita");
      cita.classList.add("confirmada");
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
    cancelButtonText: "No",
    customClass: {
      confirmButton: "swal-confirm-button-red",
      cancelButton: "swal-cancel-button",
    },
  }).then((result) => {
    if (result.isConfirmed) {
      // Acción a realizar si se confirma la cancelación
      Swal.fire({
        title: "¡Cancelada!",
        text: "La cita ha sido cancelada.",
        icon: "success",
        customClass: {
          popup: "swal-success-popup",
          icon: "swal-success-icon",
        },
      });
      // Cambiar el color del cuadro de cita al cancelar
      const cita = result.target.closest(".cita");
      cita.classList.add("cancelada");
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
    cancelButtonText: "No",
    customClass: {
      confirmButton: "swal-confirm-button-yellow",
      cancelButton: "swal-cancel-button",
    },
  }).then((result) => {
    if (result.isConfirmed) {
      // Acción a realizar si se confirma la reprogramación
      Swal.fire({
        title: "¡Reprogramada!",
        text: "La cita ha sido reprogramada.",
        icon: "success",
        customClass: {
          popup: "swal-success-popup",
          icon: "swal-success-icon",
        },
      });
      // Cambiar el color del cuadro de cita al reprogramar
      const cita = result.target.closest(".cita");
      cita.classList.add("reprogramada");
    }
  });
}

// Obtener los botones de las citas
const confirmarBotones = document.querySelectorAll(".confirmar");
const cancelarBotones = document.querySelectorAll(".cancelar");
const reprogramarBotones = document.querySelectorAll(".reprogramar");

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