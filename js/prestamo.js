<<<<<<< HEAD
let ruta = "../controladores/prestamoControlador.php";
let rutaLibro = "../controladores/libroControlador.php";

$(document).ready(function () {
  Consultar();
});

function limpiar() {
  $("#id_libro, #id_lector, #fechaPrestamo, #fechaDevolucion, #cantidad").val("");
  $("#condicion").val("-- Seleccione --");
}

function Consultar() {
  $.ajax({
    data: { accion: "CONSULTAR" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      let html = "";
      $.each(data, function (index, d) {
        html += `
          <tr>
            <td>${d.idprestamo}</td>
            <td>${d.libro}</td>
            <td>${d.lector}</td>
            <td>${d.fechaPrestamo}</td>
            <td>${d.fechaDevolucion}</td>
            <td>${d.cantidad}</td>
            <td>
              ${
                d.condicion == "ACTIVO"
                  ? "<span class='badge badge-activo'>ACTIVO</span>"
                  : "<span class='badge badge-desactivo'>INACTIVO</span>"
              }
            </td>
            <td>
              <button class='btn btn-accion-edit' data-bs-toggle='modal' data-bs-target='#EditarPrestamo' onclick='Prestamo_id(${d.idprestamo})'>
                <i class='mdi mdi-pencil text-white'></i>
              </button>
              <button class='btn btn-accion-delete' onclick='MostrarAlertaE(${d.idprestamo})'>
                <i class='mdi mdi-delete text-white'></i>
              </button>
            </td>
          </tr>`;
      });
      $("#datos").html(html);
      grid("#dtPrestamo");
    },
  });
}

function RetornarDatos(accion) {
  return {
    id_libro: $("#id_libro").val(),
    id_lector: $("#id_lector").val(),
    fechaPrestamo: $("#fechaPrestamo").val(),
    fechaDevolucion: $("#fechaDevolucion").val(),
    cantidad: $("#cantidad").val(),
    condicion: $("#condicion").val(),
    accion: accion,
  };
}

function Agregar() {
   if (
        $("#id_libro").val() === "" ||
        $("#id_lector").val() === "" ||
        $("#fechaPrestamo").val() === "" ||
        $("#fechaDevolucion").val() === "" ||
        $("#cantidad").val().trim() === "" ||
        $("#condicion").val() === "-- Seleccione --"
    ) {
        MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
        return;
    }

  $.ajax({
    data: RetornarDatos("NUEVO"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data.estado === "OK") {
        $("#AgregarPrestamo").modal("hide");
        MostrarAlerta("Éxito", "Préstamo registrado correctamente", "success");
      } else {
        MostrarAlerta("Error", data.mensaje, "error");
      }

      $("#dtPrestamo").dataTable().fnDestroy();
      Consultar();
      limpiar();
    },
    error: function () {
      MostrarAlerta("Error", "No se pudo registrar el préstamo", "error");
    }
  });
}

function Prestamo_id(id) {
  $.ajax({
    data: { idPrestamo: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (d) {
      $("#idPrestamo").val(d.idprestamo);
      $("#Eid_libro").val(d.id_libro);
      $("#Eid_lector").val(d.id_lector);
      $("#EfechaPrestamo").val(d.fechaPrestamo);
      $("#EfechaDevolucion").val(d.fechaDevolucion);
      $("#Ecantidad").val(d.cantidad);
      $("#Econdicion").val(d.condicion);
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    idPrestamo: $("#idPrestamo").val(),
    id_libro: $("#Eid_libro").val(),
    id_lector: $("#Eid_lector").val(),
    fechaPrestamo: $("#EfechaPrestamo").val(),
    fechaDevolucion: $("#EfechaDevolucion").val(),
    cantidad: $("#Ecantidad").val(),
    condicion: $("#Econdicion").val(),
    accion: accion,
  };
}

function Editar() {
     if (
        $("#id_libro").val() === "" ||
        $("#id_lector").val() === "" ||
        $("#fechaPrestamo").val() === "" ||
        $("#fechaDevolucion").val() === "" ||
        $("#cantidad").val().trim() === "" ||
        $("#condicion").val() === "-- Seleccione --"
    ) {
        MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
        return;
    }
  $.ajax({
    data: RetornarDatosEdi("MODIFICAR"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data.estado === "OK") {
        $("#EditarPrestamo").modal("hide");
        MostrarAlerta("Éxito", "Préstamo actualizado correctamente", "success");
      } else {
        MostrarAlerta("Error", data.mensaje, "error");
      }

      $("#dtPrestamo").dataTable().fnDestroy();
      Consultar();
    }
  });
}

function Eliminar(id) {

  $.ajax({
    data: { idPrestamo: id, accion: "ELIMINAR", condicion: "INACTIVO" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data.estado === "OK") {
        MostrarAlerta("Éxito", "El préstamo fue marcado como INACTIVO.", "success");
        $("#dtPrestamo").dataTable().fnDestroy();
        Consultar();
      } else {
        MostrarAlerta("Error", data.mensaje, "error");
      }

    },
    error: function () {
      MostrarAlerta("Error", "No se pudo eliminar el préstamo", "error");
    }
  });
=======
let ruta = "../controladores/prestamoControlador.php";
let rutaLibro = "../controladores/libroControlador.php";

$(document).ready(function () {
  Consultar();
});

function limpiar() {
  $("#id_libro, #id_lector, #fechaPrestamo, #fechaDevolucion, #cantidad").val("");
  $("#condicion").val("-- Seleccione --");
}

function Consultar() {
  $.ajax({
    data: { accion: "CONSULTAR" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      let html = "";
      $.each(data, function (index, d) {
        html += `
          <tr>
            <td>${d.idprestamo}</td>
            <td>${d.libro}</td>
            <td>${d.lector}</td>
            <td>${d.fechaPrestamo}</td>
            <td>${d.fechaDevolucion}</td>
            <td>${d.cantidad}</td>
            <td>
              ${
                d.condicion == "ACTIVO"
                  ? "<span class='badge badge-activo'>ACTIVO</span>"
                  : "<span class='badge badge-desactivo'>INACTIVO</span>"
              }
            </td>
            <td>
              <button class='btn btn-accion-edit' data-bs-toggle='modal' data-bs-target='#EditarPrestamo' onclick='Prestamo_id(${d.idprestamo})'>
                <i class='mdi mdi-pencil text-white'></i>
              </button>
              <button class='btn btn-accion-delete' onclick='MostrarAlertaE(${d.idprestamo})'>
                <i class='mdi mdi-delete text-white'></i>
              </button>
            </td>
          </tr>`;
      });
      $("#datos").html(html);
      grid("#dtPrestamo");
    },
  });
}

function RetornarDatos(accion) {
  return {
    id_libro: $("#id_libro").val(),
    id_lector: $("#id_lector").val(),
    fechaPrestamo: $("#fechaPrestamo").val(),
    fechaDevolucion: $("#fechaDevolucion").val(),
    cantidad: $("#cantidad").val(),
    condicion: $("#condicion").val(),
    accion: accion,
  };
}

function Agregar() {
   if (
        $("#id_libro").val() === "" ||
        $("#id_lector").val() === "" ||
        $("#fechaPrestamo").val() === "" ||
        $("#fechaDevolucion").val() === "" ||
        $("#cantidad").val().trim() === "" ||
        $("#condicion").val() === "-- Seleccione --"
    ) {
        MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
        return;
    }

  $.ajax({
    data: RetornarDatos("NUEVO"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data.estado === "OK") {
        $("#AgregarPrestamo").modal("hide");
        MostrarAlerta("Éxito", "Préstamo registrado correctamente", "success");
      } else {
        MostrarAlerta("Error", data.mensaje, "error");
      }

      $("#dtPrestamo").dataTable().fnDestroy();
      Consultar();
      limpiar();
    },
    error: function () {
      MostrarAlerta("Error", "No se pudo registrar el préstamo", "error");
    }
  });
}

function Prestamo_id(id) {
  $.ajax({
    data: { idPrestamo: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (d) {
      $("#idPrestamo").val(d.idprestamo);
      $("#Eid_libro").val(d.id_libro);
      $("#Eid_lector").val(d.id_lector);
      $("#EfechaPrestamo").val(d.fechaPrestamo);
      $("#EfechaDevolucion").val(d.fechaDevolucion);
      $("#Ecantidad").val(d.cantidad);
      $("#Econdicion").val(d.condicion);
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    idPrestamo: $("#idPrestamo").val(),
    id_libro: $("#Eid_libro").val(),
    id_lector: $("#Eid_lector").val(),
    fechaPrestamo: $("#EfechaPrestamo").val(),
    fechaDevolucion: $("#EfechaDevolucion").val(),
    cantidad: $("#Ecantidad").val(),
    condicion: $("#Econdicion").val(),
    accion: accion,
  };
}

function Editar() {
     if (
        $("#id_libro").val() === "" ||
        $("#id_lector").val() === "" ||
        $("#fechaPrestamo").val() === "" ||
        $("#fechaDevolucion").val() === "" ||
        $("#cantidad").val().trim() === "" ||
        $("#condicion").val() === "-- Seleccione --"
    ) {
        MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
        return;
    }
  $.ajax({
    data: RetornarDatosEdi("MODIFICAR"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data.estado === "OK") {
        $("#EditarPrestamo").modal("hide");
        MostrarAlerta("Éxito", "Préstamo actualizado correctamente", "success");
      } else {
        MostrarAlerta("Error", data.mensaje, "error");
      }

      $("#dtPrestamo").dataTable().fnDestroy();
      Consultar();
    }
  });
}

function Eliminar(id) {

  $.ajax({
    data: { idPrestamo: id, accion: "ELIMINAR", condicion: "INACTIVO" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data.estado === "OK") {
        MostrarAlerta("Éxito", "El préstamo fue marcado como INACTIVO.", "success");
        $("#dtPrestamo").dataTable().fnDestroy();
        Consultar();
      } else {
        MostrarAlerta("Error", data.mensaje, "error");
      }

    },
    error: function () {
      MostrarAlerta("Error", "No se pudo eliminar el préstamo", "error");
    }
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}