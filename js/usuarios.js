<<<<<<< HEAD
let ruta = "../controladores/usuarioControlador.php";

$(document).ready(function () {
  Listar();
});

function limpiar() {
  $("#nombre, #usuario, #pass").val("");
  $("#id_perfil, #estado").val("-- Seleccione --");
}

function Listar() {
  $.post(ruta, { accion: "CONSULTAR" }, function (e) {
    let d = JSON.parse(e),
      html = "";

    d.forEach((x) => {
      html += `
        <tr>
          <td>${x.id_usuario}</td>
          <td>${x.nombre}</td>
          <td>${x.usuario}</td>
          <td>${x.nombre_perfil || ""}</td>
          <td>${
            x.estado == "A"
              ? "<span class='badge badge-activo'>ACTIVO</span>"
              : "<span class='badge badge-desactivo'>INACTIVO</span>"
          }</td>
          <td>
            <button class='btn btn-accion-edit' data-bs-toggle='modal' data-bs-target='#EditarUsuario' onclick='Usuario_id(${x.id_usuario})'>
              <i class='mdi mdi-pencil'></i>
            </button>
            <button class='btn btn-accion-delete' onclick='MostrarAlertaE(${x.id_usuario})'>
              <i class='mdi mdi-delete'></i>
            </button>
          </td>
        </tr>`;
    });

    $("#datos").html(html);
    grid("#dtUsuario");
  });
}

function RetornarDatos(accion) {
  return {
    nombre: $("#nombre").val(),
    usuario: $("#usuario").val(),
    pass: $("#pass").val(),
    id_perfil: $("#id_perfil").val(),
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
        $("#AgregarUsuario").modal("hide");
        MostrarAlerta("Éxito", "Usuario agregado correctamente", "success");
        $("#dtUsuario").dataTable().fnDestroy();
        Listar();
        limpiar();
      } else {
        MostrarAlerta("Error", data, "error");
      }
    },
  });
}

function Usuario_id(id) {
  $.ajax({
    data: { idUsuario: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (d) {
      $("#idUsuario").val(d.id_usuario);
      $("#Enombre").val(d.nombre);
      $("#Eusuario").val(d.usuario);
      $("#Epass").val(d.pass);
      $("#Eid_perfil").val(d.id_perfil);
      $("#Eestado").val(d.estado);
    },
    error: function () {
      MostrarAlerta("Error", "No se pudo cargar los datos", "error");
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    idUsuario: $("#idUsuario").val(),
    nombre: $("#Enombre").val(),
    usuario: $("#Eusuario").val(),
    pass: $("#Epass").val(),
    id_perfil: $("#Eid_perfil").val(),
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
        $("#EditarUsuario").modal("hide");
        MostrarAlerta("Éxito", "Usuario actualizado correctamente", "success");
        $("#dtUsuario").dataTable().fnDestroy();
        Listar();
      } else {
        MostrarAlerta("Error", data, "error");
      }
    },
  });
}

function Eliminar(id) {
  $.ajax({
    data: { idUsuario: id, accion: "ELIMINAR", estado: "I" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data == "OK") {
        $("#dtUsuario").dataTable().fnDestroy();
        Listar();
      } else {
        MostrarAlerta("Error", data, "error");
      }
    },
  });
=======
let ruta = "../controladores/usuarioControlador.php";

$(document).ready(function () {
  Listar();
});

function limpiar() {
  $("#nombre, #usuario, #pass").val("");
  $("#id_perfil, #estado").val("-- Seleccione --");
}

function Listar() {
  $.post(ruta, { accion: "CONSULTAR" }, function (e) {
    let d = JSON.parse(e),
      html = "";

    d.forEach((x) => {
      html += `
        <tr>
          <td>${x.id_usuario}</td>
          <td>${x.nombre}</td>
          <td>${x.usuario}</td>
          <td>${x.nombre_perfil || ""}</td>
          <td>${
            x.estado == "A"
              ? "<span class='badge badge-activo'>ACTIVO</span>"
              : "<span class='badge badge-desactivo'>INACTIVO</span>"
          }</td>
          <td>
            <button class='btn btn-accion-edit' data-bs-toggle='modal' data-bs-target='#EditarUsuario' onclick='Usuario_id(${x.id_usuario})'>
              <i class='mdi mdi-pencil'></i>
            </button>
            <button class='btn btn-accion-delete' onclick='MostrarAlertaE(${x.id_usuario})'>
              <i class='mdi mdi-delete'></i>
            </button>
          </td>
        </tr>`;
    });

    $("#datos").html(html);
    grid("#dtUsuario");
  });
}

function RetornarDatos(accion) {
  return {
    nombre: $("#nombre").val(),
    usuario: $("#usuario").val(),
    pass: $("#pass").val(),
    id_perfil: $("#id_perfil").val(),
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
        $("#AgregarUsuario").modal("hide");
        MostrarAlerta("Éxito", "Usuario agregado correctamente", "success");
        $("#dtUsuario").dataTable().fnDestroy();
        Listar();
        limpiar();
      } else {
        MostrarAlerta("Error", data, "error");
      }
    },
  });
}

function Usuario_id(id) {
  $.ajax({
    data: { idUsuario: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (d) {
      $("#idUsuario").val(d.id_usuario);
      $("#Enombre").val(d.nombre);
      $("#Eusuario").val(d.usuario);
      $("#Epass").val(d.pass);
      $("#Eid_perfil").val(d.id_perfil);
      $("#Eestado").val(d.estado);
    },
    error: function () {
      MostrarAlerta("Error", "No se pudo cargar los datos", "error");
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    idUsuario: $("#idUsuario").val(),
    nombre: $("#Enombre").val(),
    usuario: $("#Eusuario").val(),
    pass: $("#Epass").val(),
    id_perfil: $("#Eid_perfil").val(),
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
        $("#EditarUsuario").modal("hide");
        MostrarAlerta("Éxito", "Usuario actualizado correctamente", "success");
        $("#dtUsuario").dataTable().fnDestroy();
        Listar();
      } else {
        MostrarAlerta("Error", data, "error");
      }
    },
  });
}

function Eliminar(id) {
  $.ajax({
    data: { idUsuario: id, accion: "ELIMINAR", estado: "I" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data == "OK") {
        $("#dtUsuario").dataTable().fnDestroy();
        Listar();
      } else {
        MostrarAlerta("Error", data, "error");
      }
    },
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}