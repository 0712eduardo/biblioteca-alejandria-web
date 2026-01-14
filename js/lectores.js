<<<<<<< HEAD
let ruta = "../controladores/lectorControlador.php";

$(document).ready(function () {
  Consultar();
});

function limpiar() {
  $("#nom").val("");
  $("#dir").val("");
  $("#tel").val("");
  $("#con").val("-- Elija Condición --");
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

        let badge = d.condicion === "ACTIVO"
          ? "<span class='badge badge-activo'>ACTIVO</span>"
          : "<span class='badge badge-desactivo'>DESACTIVO</span>";

        let botones = `
            <button class='btn btn-accion-edit btn-sm mx-1' 
                data-bs-toggle='modal' 
                data-bs-target='#EditarLector' 
                onclick='Lector_id(${d.id_lector});'>
                <i class='mdi mdi-pencil'></i>
            </button>

            <button class='btn btn-accion-delete btn-sm mx-1' 
                onclick='MostrarAlertaE(${d.id_lector});'>
                <i class='mdi mdi-delete-forever'></i>
            </button>
        `;

        html += `
            <tr>
                <td>${d.id_lector}</td>
                <td>${d.nom_lector}</td>
                <td>${d.direccion}</td>
                <td>${d.telefono}</td>
                <td style="text-align:center;">${badge}</td>
                <td style="text-align:center;">${botones}</td>
            </tr>
        `;
      });

      $("#datos").html(html);

      $("#dtLector").DataTable().destroy();
      grid("#dtLector");
    },
  });
}

function Agregar() {
  let nom = $("#nom").val();
  let dir = $("#dir").val();
  let tel = $("#tel").val();
  let con = $("#con").val();

  if (nom === "" || dir === "" || tel === "" || con === "-- Elija Condición --") {
    MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
    return;
  }

  $.ajax({
    data: RetornarDatos("NUEVO"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data === "OK") {
        $("#AgregarLector").modal("toggle");
        MostrarAlerta("Éxito", "Datos guardados correctamente", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      limpiar();
      $("#dtLector").DataTable().destroy();
      Consultar();
    },
  });
}

function RetornarDatos(accion) {
  return {
    nom: $("#nom").val(),
    dir: $("#dir").val(),
    tel: $("#tel").val(),
    con: $("#con").val(),
    accion: accion,
  };
}

function Lector_id(id) {
  $.ajax({
    data: { idLector: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      $("#Enom").val(data.nom_lector);
      $("#Edir").val(data.direccion);
      $("#Etel").val(data.telefono);
      $("#Econ").val(data.condicion);
      $("#idLector").val(data.id_lector);
    },
  });
}

function Editar() {
  let nom = $("#Enom").val();
  let dir = $("#Edir").val();
  let tel = $("#Etel").val();
  let con = $("#Econ").val();

  if (nom === "" || dir === "" || tel === "" || con === "-- Elija Condición --") {
    MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
    return;
  }

  $.ajax({
    data: RetornarDatosEdi("MODIFICAR"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data === "OK") {
        $("#EditarLector").modal("toggle");
        MostrarAlerta("Éxito", "Datos actualizados con éxito", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      $("#dtLector").DataTable().destroy();
      Consultar();
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    nom: $("#Enom").val(),
    dir: $("#Edir").val(),
    tel: $("#Etel").val(),
    con: $("#Econ").val(),
    idLector: $("#idLector").val(),
    accion: accion,
  };
}

function Eliminar(id) {
  $.ajax({
    data: { idLector: id, accion: "ELIMINAR", condicion: "DESACTIVO" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data !== "OK") {
        MostrarAlerta("Error", data, "error");
      }
      $("#dtLector").DataTable().destroy();
      Consultar();
    },
  });
=======
let ruta = "../controladores/lectorControlador.php";

$(document).ready(function () {
  Consultar();
});

function limpiar() {
  $("#nom").val("");
  $("#dir").val("");
  $("#tel").val("");
  $("#con").val("-- Elija Condición --");
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

        let badge = d.condicion === "ACTIVO"
          ? "<span class='badge badge-activo'>ACTIVO</span>"
          : "<span class='badge badge-desactivo'>DESACTIVO</span>";

        let botones = `
            <button class='btn btn-accion-edit btn-sm mx-1' 
                data-bs-toggle='modal' 
                data-bs-target='#EditarLector' 
                onclick='Lector_id(${d.id_lector});'>
                <i class='mdi mdi-pencil'></i>
            </button>

            <button class='btn btn-accion-delete btn-sm mx-1' 
                onclick='MostrarAlertaE(${d.id_lector});'>
                <i class='mdi mdi-delete-forever'></i>
            </button>
        `;

        html += `
            <tr>
                <td>${d.id_lector}</td>
                <td>${d.nom_lector}</td>
                <td>${d.direccion}</td>
                <td>${d.telefono}</td>
                <td style="text-align:center;">${badge}</td>
                <td style="text-align:center;">${botones}</td>
            </tr>
        `;
      });

      $("#datos").html(html);

      $("#dtLector").DataTable().destroy();
      grid("#dtLector");
    },
  });
}

function Agregar() {
  let nom = $("#nom").val();
  let dir = $("#dir").val();
  let tel = $("#tel").val();
  let con = $("#con").val();

  if (nom === "" || dir === "" || tel === "" || con === "-- Elija Condición --") {
    MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
    return;
  }

  $.ajax({
    data: RetornarDatos("NUEVO"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data === "OK") {
        $("#AgregarLector").modal("toggle");
        MostrarAlerta("Éxito", "Datos guardados correctamente", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      limpiar();
      $("#dtLector").DataTable().destroy();
      Consultar();
    },
  });
}

function RetornarDatos(accion) {
  return {
    nom: $("#nom").val(),
    dir: $("#dir").val(),
    tel: $("#tel").val(),
    con: $("#con").val(),
    accion: accion,
  };
}

function Lector_id(id) {
  $.ajax({
    data: { idLector: id, accion: "CONSULTAR_ID" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      $("#Enom").val(data.nom_lector);
      $("#Edir").val(data.direccion);
      $("#Etel").val(data.telefono);
      $("#Econ").val(data.condicion);
      $("#idLector").val(data.id_lector);
    },
  });
}

function Editar() {
  let nom = $("#Enom").val();
  let dir = $("#Edir").val();
  let tel = $("#Etel").val();
  let con = $("#Econ").val();

  if (nom === "" || dir === "" || tel === "" || con === "-- Elija Condición --") {
    MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
    return;
  }

  $.ajax({
    data: RetornarDatosEdi("MODIFICAR"),
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data === "OK") {
        $("#EditarLector").modal("toggle");
        MostrarAlerta("Éxito", "Datos actualizados con éxito", "success");
      } else {
        MostrarAlerta("Error", data, "error");
      }

      $("#dtLector").DataTable().destroy();
      Consultar();
    },
  });
}

function RetornarDatosEdi(accion) {
  return {
    nom: $("#Enom").val(),
    dir: $("#Edir").val(),
    tel: $("#Etel").val(),
    con: $("#Econ").val(),
    idLector: $("#idLector").val(),
    accion: accion,
  };
}

function Eliminar(id) {
  $.ajax({
    data: { idLector: id, accion: "ELIMINAR", condicion: "DESACTIVO" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      if (data !== "OK") {
        MostrarAlerta("Error", data, "error");
      }
      $("#dtLector").DataTable().destroy();
      Consultar();
    },
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}