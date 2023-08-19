document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      buttonText: {
        today: 'Hoy', // Cambia el texto del botón "Today" a "Hoy"
      },
      events: {
        url: '../../controllers/calendario_eventos.php', // Ruta al archivo PHP que obtiene eventos
        method: 'GET',
        extraParams: {
          estado: 'confirmado' // Filtra por estado "confirmado"
        },
        failure: function() {
          alert('Error al cargar eventos');
        },
        color: 'transparent',
      },
      editable: true, // Habilitar la edición de eventos
      selectable: true, // Habilitar la selección para crear nuevos eventos
      eventClick: function(info) {
        // Manejar clic en un evento existente
        console.log('Evento clickeado:', info.event);
      },
      dateClick: function(info) {
        // Manejar clic en una fecha vacía (para crear nuevos eventos)
        console.log('Fecha clickeada:', info.dateStr);
      },
      eventClassNames: ['eventos-calendar'],
    });
    calendar.render();
});
