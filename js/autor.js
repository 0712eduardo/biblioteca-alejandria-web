<<<<<<< HEAD
let ruta = "../controladores/autorControlador.php";

$(document).ready(function () {
  cargarAutores();

  $("#cbAutor").change(function () {
    let autor = $(this).val();
    if (autor !== "-- Seleccione --") {
      mostrarLibrosAutor(autor);
    } else {
      $("#librosAutor").html("");
      $("#nombreAutor").html("");
    }
  });
});

function cargarAutores() {
  $.ajax({
    data: { accion: "CONSULTAR_AUTORES" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      let opciones = "<option>-- Seleccione --</option>";
      $.each(data, function (i, a) {
        opciones += `<option value='${a.autor}'>${a.autor}</option>`;
      });
      $("#cbAutor").html(opciones);
    },
  });
}

function mostrarLibrosAutor(autor) {
  $.ajax({
    data: { accion: "CONSULTAR_LIBROS_AUTOR", autor: autor },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      $("#nombreAutor").html("Libros de " + autor);

      let html = "";
      $.each(data, function (i, l) {
        html += `
          <div class="col-md-4">
            <div class="card mb-3 shadow-sm" style="background-color:#1F212C; border:1px solid #d4af37;">
              <div class="card-body text-white">
                <h6 class="card-title text-warning fw-bold">${l.titulo}</h6>
                <p class="card-text"><b>Categoría:</b> ${l.categoria}</p>
                <p class="card-text"><b>Año:</b> ${l.anio}</p>
                <p class="card-text"><b>Stock disponible:</b> ${l.stock_disponible}</p>
              </div>
            </div>
          </div>
        `;
      });

      $("#librosAutor").html(html);
    },
  });
=======
let ruta = "../controladores/autorControlador.php";

$(document).ready(function () {
  cargarAutores();

  $("#cbAutor").change(function () {
    let autor = $(this).val();
    if (autor !== "-- Seleccione --") {
      mostrarLibrosAutor(autor);
    } else {
      $("#librosAutor").html("");
      $("#nombreAutor").html("");
    }
  });
});

function cargarAutores() {
  $.ajax({
    data: { accion: "CONSULTAR_AUTORES" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      let opciones = "<option>-- Seleccione --</option>";
      $.each(data, function (i, a) {
        opciones += `<option value='${a.autor}'>${a.autor}</option>`;
      });
      $("#cbAutor").html(opciones);
    },
  });
}

function mostrarLibrosAutor(autor) {
  $.ajax({
    data: { accion: "CONSULTAR_LIBROS_AUTOR", autor: autor },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      $("#nombreAutor").html("Libros de " + autor);

      let html = "";
      $.each(data, function (i, l) {
        html += `
          <div class="col-md-4">
            <div class="card mb-3 shadow-sm" style="background-color:#1F212C; border:1px solid #d4af37;">
              <div class="card-body text-white">
                <h6 class="card-title text-warning fw-bold">${l.titulo}</h6>
                <p class="card-text"><b>Categoría:</b> ${l.categoria}</p>
                <p class="card-text"><b>Año:</b> ${l.anio}</p>
                <p class="card-text"><b>Stock disponible:</b> ${l.stock_disponible}</p>
              </div>
            </div>
          </div>
        `;
      });

      $("#librosAutor").html(html);
    },
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}