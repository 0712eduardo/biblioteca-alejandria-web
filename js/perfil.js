<<<<<<< HEAD
let ruta = "../controladores/perfilControlador.php";

$(document).ready(function () {
  Consultar();
});

function limpiar() {
  $("#nombre_perfil").val("");
  $("#estado").val("-- Seleccione --");
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

        let badge =
          d.estado == "A"
            ? "<span class='badge-activo'>ACTIVO</span>"
            : "<span class='badge-desactivo'>INACTIVO</span>";

        html += `
          <tr>
            <td>${d.id_perfil}</td>
            <td>${d.nombre_perfil}</td>
            <td>${badge}</td>

            <td>
              <button class='btn-accion-edit' data-bs-toggle='modal' data-bs-target='#EditarPerfil' onclick='Perfil_id(${d.id_perfil})'>
                <i class='mdi mdi-pencil'></i>
              </button>

              <button class='btn-accion-delete' onclick='MostrarAlertaE(${d.id_perfil})'>
                <i class='mdi mdi-delete'></i>
              </button>
            </td>
          </tr>`;
      });

      $("#datos").html(html);
      grid("#dtPerfil");
    },
  });
}

function RetornarDatos(accion) {
  return {
    nombre_perfil: $("#nombre_perfil").val(),
    estado: $("#estado").val(),
    accion: accion,
  };
}

function Agregar() {
  $.ajax({
    data: RetornarDatos("NUEVO"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data == "OK") {
        $("#AgregarPerfil").modal("toggle");
        MostrarAlerta("Éxito", "Perfil agregado correctamente", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      $("#dtPerfil").dataTable().fnDestroy();
      Consultar();
      limpiar();
    },
  });
}

function Perfil_id(id) {
  $.ajax({
    data: { idPerfil: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (d) {
      $("#idPerfil").val(d.id_perfil);
      $("#Enombre_perfil").val(d.nombre_perfil);
      $("#Eestado").val(d.estado);
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    idPerfil: $("#idPerfil").val(),
    nombre_perfil: $("#Enombre_perfil").val(),
    estado: $("#Eestado").val(),
    accion: accion,
  };
}

function Editar() {
  $.ajax({
    data: RetornarDatosEdi("MODIFICAR"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data == "OK") {
        $("#EditarPerfil").modal("toggle");
        MostrarAlerta("Éxito", "Perfil actualizado correctamente", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      $("#dtPerfil").dataTable().fnDestroy();
      Consultar();
    },
  });
}

function Eliminar(id) {
  $.ajax({
    data: { idPerfil: id, accion: "ELIMINAR" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function () {
      $("#dtPerfil").dataTable().fnDestroy();
      Consultar();
    },
  });
=======
let ruta = "../controladores/perfilControlador.php";

$(document).ready(function () {
  Consultar();
});

function limpiar() {
  $("#nombre_perfil").val("");
  $("#estado").val("-- Seleccione --");
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

        let badge =
          d.estado == "A"
            ? "<span class='badge-activo'>ACTIVO</span>"
            : "<span class='badge-desactivo'>INACTIVO</span>";

        html += `
          <tr>
            <td>${d.id_perfil}</td>
            <td>${d.nombre_perfil}</td>
            <td>${badge}</td>

            <td>
              <button class='btn-accion-edit' data-bs-toggle='modal' data-bs-target='#EditarPerfil' onclick='Perfil_id(${d.id_perfil})'>
                <i class='mdi mdi-pencil'></i>
              </button>

              <button class='btn-accion-delete' onclick='MostrarAlertaE(${d.id_perfil})'>
                <i class='mdi mdi-delete'></i>
              </button>
            </td>
          </tr>`;
      });

      $("#datos").html(html);
      grid("#dtPerfil");
    },
  });
}

function RetornarDatos(accion) {
  return {
    nombre_perfil: $("#nombre_perfil").val(),
    estado: $("#estado").val(),
    accion: accion,
  };
}

function Agregar() {
  $.ajax({
    data: RetornarDatos("NUEVO"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data == "OK") {
        $("#AgregarPerfil").modal("toggle");
        MostrarAlerta("Éxito", "Perfil agregado correctamente", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      $("#dtPerfil").dataTable().fnDestroy();
      Consultar();
      limpiar();
    },
  });
}

function Perfil_id(id) {
  $.ajax({
    data: { idPerfil: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (d) {
      $("#idPerfil").val(d.id_perfil);
      $("#Enombre_perfil").val(d.nombre_perfil);
      $("#Eestado").val(d.estado);
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    idPerfil: $("#idPerfil").val(),
    nombre_perfil: $("#Enombre_perfil").val(),
    estado: $("#Eestado").val(),
    accion: accion,
  };
}

function Editar() {
  $.ajax({
    data: RetornarDatosEdi("MODIFICAR"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {

      if (data == "OK") {
        $("#EditarPerfil").modal("toggle");
        MostrarAlerta("Éxito", "Perfil actualizado correctamente", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      $("#dtPerfil").dataTable().fnDestroy();
      Consultar();
    },
  });
}

function Eliminar(id) {
  $.ajax({
    data: { idPerfil: id, accion: "ELIMINAR" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function () {
      $("#dtPerfil").dataTable().fnDestroy();
      Consultar();
    },
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}