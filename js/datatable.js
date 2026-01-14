<<<<<<< HEAD
function grid(dt) {
  $(dt).dataTable({
    destroy: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json",
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior",
      },
    },
    dom: "Bfrtip",
    buttons: [
      {
        extend: "copy",
        text: "Copiar",
        className: "btn-dt-copy",
      },
      {
        extend: "csv",
        text: "CSV",
        className: "btn-dt-csv",
      },
      {
        extend: "excel",
        text: "Excel",
        className: "btn-dt-excel",
      },
      {
        extend: "pdf",
        text: "PDF",
        className: "btn-dt-pdf",
      },
      {
        extend: "print",
        text: "Imprimir",
        className: "btn-dt-print",
      },
    ],
    lengthMenu: [[5, 10, 20], [5, 10, 20]],
    paging: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
  });
=======
function grid(dt) {
  $(dt).dataTable({
    destroy: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json",
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior",
      },
    },
    dom: "Bfrtip",
    buttons: [
      {
        extend: "copy",
        text: "Copiar",
        className: "btn-dt-copy",
      },
      {
        extend: "csv",
        text: "CSV",
        className: "btn-dt-csv",
      },
      {
        extend: "excel",
        text: "Excel",
        className: "btn-dt-excel",
      },
      {
        extend: "pdf",
        text: "PDF",
        className: "btn-dt-pdf",
      },
      {
        extend: "print",
        text: "Imprimir",
        className: "btn-dt-print",
      },
    ],
    lengthMenu: [[5, 10, 20], [5, 10, 20]],
    paging: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}