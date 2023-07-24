
//Eliminar curriculum
document.addEventListener('DOMContentLoaded', function() {
  const enlacesEliminar = document.querySelectorAll('.eliminar-archivo');
  enlacesEliminar.forEach(function(enlace) {
    enlace.addEventListener('click', function(event) {
      event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
      
      // Mostrar la alerta de SweetAlert
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'El archivo será eliminado permanentemente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // Si el usuario hace clic en "Eliminar", realizar la eliminación mediante AJAX
          eliminarArchivo(enlace.href);
        }
      });
    });
  });
});

// Función para eliminar el archivo mediante AJAX
function eliminarArchivo(url) {
  // Enviar una solicitud AJAX al controlador eliminar_archivo.php
  fetch(url, {
    method: 'DELETE' // Utilizamos el método DELETE para indicar que queremos eliminar el archivo
  })
  .then(response => response.json())
  .then(data => {
    // Manejar la respuesta del controlador
    if (data.success) {
      // Mostrar una alerta de éxito
      Swal.fire({
        title: '¡Éxito!',
        text: 'El archivo ha sido eliminado correctamente.',
        icon: 'success'
      }).then(() => {
        // Actualizar la página después de eliminar el archivo
        window.location.reload();
      });
    } else {
      // Mostrar una alerta de error
      Swal.fire({
        title: 'Error',
        text: 'Ocurrió un error al eliminar el archivo.',
        icon: 'error'
      });
    }
  })
  .catch(error => {
    // Mostrar una alerta de error en caso de que haya un problema con la solicitud AJAX
    Swal.fire({
      title: 'Error',
      text: 'Ocurrió un error al eliminar el archivo.',
      icon: 'error'
    });
  });
}


