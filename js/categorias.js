<<<<<<< HEAD
$(document).ready(function () {
  listarCategoria();

  function listarCategoria() {

  if ($.fn.DataTable.isDataTable("#dtCategoria")) {
    $("#dtCategoria").DataTable().destroy();
  }

  $.ajax({
    url: "../controladores/categoriaControlador.php",
    type: "POST",
    data: { accion: "listar" },
    success: function (data) {

      $("#datos").html(data);  

      grid("#dtCategoria");
    }
  });
}

  $("#btnGuardar").click(function () {
    const id = $("#idcategoria").val();
    const nombre = $("#nombre").val().trim();
    const descripcion = $("#descripcion").val().trim();
    const accion = id ? "editar" : "insertar";

    if (nombre === "") {
      MostrarAlerta("ALERTA", "El nombre es obligatorio", "warning");
      return;
    }

    $.ajax({
      url: "../controladores/categoriaControlador.php",
      type: "POST",
      data: { id, nombre, descripcion, accion },
      dataType: "json",
      success: function (response) {

        if (response.status === "OK") {
          MostrarAlerta("Éxito", response.mensaje, "success");
        } else {
          MostrarAlerta("Error", response.mensaje, "error");
        }

        $("#AgregarCategoria").modal("hide");
        $("#formCategoria")[0].reset();
        listarCategoria();
      },
      error: function () {
        MostrarAlerta("Error", "Error de conexión con el servidor", "error");
      }
    });
  });

  $(document).on("click", ".editar", function () {
    $("#modalCategoriaLabel").text("Editar Categoría");

    $("#idcategoria").val($(this).data("id"));
    $("#nombre").val($(this).data("nombre"));
    $("#descripcion").val($(this).data("descripcion"));

    $("#AgregarCategoria").modal("show");
  });

  $(document).on("click", ".eliminar", function () {
    let id = $(this).data("id");

    Swal.fire({
      title: "¿Desactivar categoría?",
      text: "La categoría pasará a estado INACTIVO",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, desactivar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "../controladores/categoriaControlador.php",
          type: "POST",
          data: { id, accion: "eliminar" },
          dataType: "json",
          success: function (response) {

            if (response.status === "OK") {
              MostrarAlerta("Éxito", response.mensaje, "success");
            } else {
              MostrarAlerta("Error", response.mensaje, "error");
            }

            listarCategoria();
          },
          error: function () {
            MostrarAlerta("Error", "No se pudo desactivar la categoría", "error");
          }
        });
      }
    });
  });
=======
$(document).ready(function () {
  listarCategoria();

  function listarCategoria() {

  if ($.fn.DataTable.isDataTable("#dtCategoria")) {
    $("#dtCategoria").DataTable().destroy();
  }

  $.ajax({
    url: "../controladores/categoriaControlador.php",
    type: "POST",
    data: { accion: "listar" },
    success: function (data) {

      $("#datos").html(data);  

      grid("#dtCategoria");
    }
  });
}

  $("#btnGuardar").click(function () {
    const id = $("#idcategoria").val();
    const nombre = $("#nombre").val().trim();
    const descripcion = $("#descripcion").val().trim();
    const accion = id ? "editar" : "insertar";

    if (nombre === "") {
      MostrarAlerta("ALERTA", "El nombre es obligatorio", "warning");
      return;
    }

    $.ajax({
      url: "../controladores/categoriaControlador.php",
      type: "POST",
      data: { id, nombre, descripcion, accion },
      dataType: "json",
      success: function (response) {

        if (response.status === "OK") {
          MostrarAlerta("Éxito", response.mensaje, "success");
        } else {
          MostrarAlerta("Error", response.mensaje, "error");
        }

        $("#AgregarCategoria").modal("hide");
        $("#formCategoria")[0].reset();
        listarCategoria();
      },
      error: function () {
        MostrarAlerta("Error", "Error de conexión con el servidor", "error");
      }
    });
  });

  $(document).on("click", ".editar", function () {
    $("#modalCategoriaLabel").text("Editar Categoría");

    $("#idcategoria").val($(this).data("id"));
    $("#nombre").val($(this).data("nombre"));
    $("#descripcion").val($(this).data("descripcion"));

    $("#AgregarCategoria").modal("show");
  });

  $(document).on("click", ".eliminar", function () {
    let id = $(this).data("id");

    Swal.fire({
      title: "¿Desactivar categoría?",
      text: "La categoría pasará a estado INACTIVO",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, desactivar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "../controladores/categoriaControlador.php",
          type: "POST",
          data: { id, accion: "eliminar" },
          dataType: "json",
          success: function (response) {

            if (response.status === "OK") {
              MostrarAlerta("Éxito", response.mensaje, "success");
            } else {
              MostrarAlerta("Error", response.mensaje, "error");
            }

            listarCategoria();
          },
          error: function () {
            MostrarAlerta("Error", "No se pudo desactivar la categoría", "error");
          }
        });
      }
    });
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
});