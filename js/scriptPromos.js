// Agrega un event listener a los botones de eliminar
document.addEventListener('DOMContentLoaded', function() {
    const enlacesEliminar = document.querySelectorAll('.eliminar-promo');
    enlacesEliminar.forEach(function(enlace) {
        enlace.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

            // Mostrar una alerta de confirmación con SweetAlert
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'La promoción será eliminada permanentemente.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir a la URL del enlace si el usuario confirma
                    window.location.href = enlace.getAttribute('href');
                }
            });
        });
    });
});
