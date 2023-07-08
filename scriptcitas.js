document.addEventListener('DOMContentLoaded', function() {
    const buttonBorrarDatos = document.getElementById('borrar-datos');
    
    buttonBorrarDatos.addEventListener('click', function() {
        Swal.fire({
            title: 'Confirmar',
            text: '¿Estás seguro de que deseas borrar los datos ingresados?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('booking-form').reset();
                Swal.fire('Datos borrados', 'Los datos han sido borrados exitosamente', 'success');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const buttonAgendarCita = document.getElementById('agendar-cita');
    
    buttonAgendarCita.addEventListener('click', function(event) {
        event.preventDefault(); // Evitar que se envíe el formulario
        
        const name = document.getElementById('name').value;
        const lastName = document.getElementById('last-name').value;
        const cedula = document.getElementById('cedula').value;
        const phone = document.getElementById('phone').value;
        const date = document.getElementById('date').value;
        const time = document.getElementById('time').value;
        const service = document.getElementById('service').value;
        const message = document.getElementById('message').value;
        
        const messageText = `Nombres: ${name}\nApellidos: ${lastName}\nCédula: ${cedula}\nTeléfono: ${phone}\nFecha de cita: ${date}\nHora de cita: ${time}\nServicio: ${service}\nMensaje adicional: ${message}`;
        
        Swal.fire({
            title: 'Confirmar',
            text: `¿Estás seguro de que deseas agendar la cita?\n\n${messageText}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, agendar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('booking-form').submit(); // Enviar el formulario
            }
        });
    });
});