<<<<<<< HEAD
let ruta = "../controladores/facturaControlador.php";

$(document).ready(function () {
  Consultar();

  $("#subtotal").on("input", function () {
    const subtotal = parseFloat($(this).val()) || 0;
    const igv = subtotal * 0.18;
    const total = subtotal + igv;
    $("#igv").val(igv.toFixed(2));
    $("#total").val(total.toFixed(2));
  });
});

function Consultar() {
  $.ajax({
    data: { accion: "CONSULTAR" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      let html = "";

      $.each(data, function (index, f) {
        const hoy = new Date();
        const fechaDev = new Date(f.fechaDevolucion);
        let estado;
        let botonEditar = "";

        if (fechaDev < hoy) {
          estado = "<span class='badge badge-desactivo'>VENCIDO</span>";
          botonEditar = `
            <button class='btn btn-accion-edit mx-1' 
                    onclick='AbrirModal(${f.id_factura}, ${f.subtotal}, ${f.igv}, ${f.total})'>
              <i class='mdi mdi-pencil text-white'></i>
            </button>
          `;
        } else {
          estado = "<span class='badge badge-activo'>VIGENTE</span>";
        }

        html += `
          <tr>
            <td>${f.id_factura}</td>
            <td>${f.nom_lector}</td>
            <td>${f.titulo}</td>
            <td>${f.fecha}</td>
            <td>${f.fechaDevolucion}</td>
            <td>${f.tipo}</td>
            <td>${f.subtotal}</td>
            <td>${f.igv}</td>
            <td>${f.total}</td>
            <td>${estado}</td>
            <td>
              ${botonEditar}
              <button class="btn btn-nuevo" onclick="Imprimir(${f.id_factura})">
                <i class="mdi mdi-printer text-white"></i>
              </button>
            </td>
          </tr>`;
      });

      $("#datos").html(html);
      grid("#dtFactura");
    },
  });
}

function Imprimir(id) {
  window.open("../ticket.php?idf=" + id, "_blank");
}

function AbrirModal(id, subtotal, igv, total) {
  $("#id_factura").val(id);
  $("#subtotal").val(subtotal);
  $("#igv").val(igv);
  $("#total").val(total);
  $("#ModalFactura").modal("show");
}

function GuardarCambios() {
  const id = $("#id_factura").val();
  const subtotal = $("#subtotal").val();
  const igv = $("#igv").val();
  const total = $("#total").val();

  $.ajax({
    data: { accion: "ACTUALIZAR", id_factura: id, subtotal, igv, total },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (r) {

      if (r === "OK") {
        $("#ModalFactura").modal("hide");
        $("#dtFactura").dataTable().fnDestroy();
        Consultar();
        Swal.fire("Actualizado", "Factura modificada correctamente", "success");
      } else {
        Swal.fire("Error", r, "error");
      }

    },
  });
=======
let ruta = "../controladores/facturaControlador.php";

$(document).ready(function () {
  Consultar();

  $("#subtotal").on("input", function () {
    const subtotal = parseFloat($(this).val()) || 0;
    const igv = subtotal * 0.18;
    const total = subtotal + igv;
    $("#igv").val(igv.toFixed(2));
    $("#total").val(total.toFixed(2));
  });
});

function Consultar() {
  $.ajax({
    data: { accion: "CONSULTAR" },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (data) {
      let html = "";

      $.each(data, function (index, f) {
        const hoy = new Date();
        const fechaDev = new Date(f.fechaDevolucion);
        let estado;
        let botonEditar = "";

        if (fechaDev < hoy) {
          estado = "<span class='badge badge-desactivo'>VENCIDO</span>";
          botonEditar = `
            <button class='btn btn-accion-edit mx-1' 
                    onclick='AbrirModal(${f.id_factura}, ${f.subtotal}, ${f.igv}, ${f.total})'>
              <i class='mdi mdi-pencil text-white'></i>
            </button>
          `;
        } else {
          estado = "<span class='badge badge-activo'>VIGENTE</span>";
        }

        html += `
          <tr>
            <td>${f.id_factura}</td>
            <td>${f.nom_lector}</td>
            <td>${f.titulo}</td>
            <td>${f.fecha}</td>
            <td>${f.fechaDevolucion}</td>
            <td>${f.tipo}</td>
            <td>${f.subtotal}</td>
            <td>${f.igv}</td>
            <td>${f.total}</td>
            <td>${estado}</td>
            <td>
              ${botonEditar}
              <button class="btn btn-nuevo" onclick="Imprimir(${f.id_factura})">
                <i class="mdi mdi-printer text-white"></i>
              </button>
            </td>
          </tr>`;
      });

      $("#datos").html(html);
      grid("#dtFactura");
    },
  });
}

function Imprimir(id) {
  window.open("../ticket.php?idf=" + id, "_blank");
}

function AbrirModal(id, subtotal, igv, total) {
  $("#id_factura").val(id);
  $("#subtotal").val(subtotal);
  $("#igv").val(igv);
  $("#total").val(total);
  $("#ModalFactura").modal("show");
}

function GuardarCambios() {
  const id = $("#id_factura").val();
  const subtotal = $("#subtotal").val();
  const igv = $("#igv").val();
  const total = $("#total").val();

  $.ajax({
    data: { accion: "ACTUALIZAR", id_factura: id, subtotal, igv, total },
    url: ruta,
    type: "post",
    dataType: "json",
    success: function (r) {

      if (r === "OK") {
        $("#ModalFactura").modal("hide");
        $("#dtFactura").dataTable().fnDestroy();
        Consultar();
        Swal.fire("Actualizado", "Factura modificada correctamente", "success");
      } else {
        Swal.fire("Error", r, "error");
      }

    },
  });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}