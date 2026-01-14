<<<<<<< HEAD
function MostrarAlerta(titulo, mensaje, tipo) {
  Swal.fire({
    title: titulo,
    text: mensaje,
    icon: tipo,
    confirmButtonText: "Aceptar",
    confirmButtonColor: tipo === "success" ? "#198754" : "#dc3545",
  });
}

function MostrarAlertaE(id) {
  if (window.alertaActiva) return; 
  window.alertaActiva = true;

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-secondary",
    },
    buttonsStyling: true,
  });

  swalWithBootstrapButtons.fire({
    title: "⚠️ Confirmar eliminación",
    text: "¿Deseas desactivar este registro? (Se marcará como INACTIVO)",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí, desactivar",
    cancelButtonText: "Cancelar",
    reverseButtons: true,
  })
  .then((result) => {
    if (result.isConfirmed) {
      Eliminar(id);
    }
  })
  .finally(() => {
    window.alertaActiva = false; 
  });
=======
function MostrarAlerta(titulo, mensaje, tipo) {
  Swal.fire({
    title: titulo,
    text: mensaje,
    icon: tipo,
    confirmButtonText: "Aceptar",
    confirmButtonColor: tipo === "success" ? "#198754" : "#dc3545",
  });
}

function MostrarAlertaE(id) {
  if (window.alertaActiva) return; 
  window.alertaActiva = true;

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-secondary",
    },
    buttonsStyling: true,
  });

  swalWithBootstrapButtons.fire({
    title: "⚠️ Confirmar eliminación",
    text: "¿Deseas desactivar este registro? (Se marcará como INACTIVO)",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí, desactivar",
    cancelButtonText: "Cancelar",
    reverseButtons: true,
  })
  .then((result) => {
    if (result.isConfirmed) {
      Eliminar(id);
    }
  })
  .finally(() => {
    window.alertaActiva = false; 
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}