<<<<<<< HEAD
let ruta = "../controladores/ERlectoresControlador.php";

$(document).ready(function () {
   
});

function limpiar() {
    $("#cond").val("");
    $("#datos").html("");
}

function r_lectores() {
    var cond = $("#cond").val();

    if (cond === "") {
        MostrarAlerta("ALERTA", "Seleccione una condición", "warning");
        return;
    }

    window.open("fpdf/ERlectores.php?condicion=" + cond);
}

function Consultar(cond) {
    $.ajax({
        data: {condicion: cond, accion: "CONSULTAR"},
        url: ruta,
        type: "post",
        dataType: "json",
        success: function (data) {
            let html = "";
            $.each(data, function (i, x) {
                html += `
                <tr>
                    <td>${x.id_lector}</td>
                    <td>${x.nom_lector}</td>
                    <td>${x.direccion}</td>
                    <td>${x.telefono}</td>
                    <td>${x.condicion}</td>
                    <td>${x.fecha_registro}</td>
                </tr>`;
            });

            $("#dtERLectores").DataTable().destroy();

            $("#datos").html(html);

            grid("#dtERLectores");
        }
    });
}

$("#cond").change(function () {
    let cond = $(this).val();
    if (cond !== "") Consultar(cond);
});
function SeleccionarCondicion(valor) {
    $("#cond").val(valor);
    $("#ACondicionLector").modal("hide");
    Consultar(valor);
=======
let ruta = "../controladores/ERlectoresControlador.php";

$(document).ready(function () {
   
});

function limpiar() {
    $("#cond").val("");
    $("#datos").html("");
}

function r_lectores() {
    var cond = $("#cond").val();

    if (cond === "") {
        MostrarAlerta("ALERTA", "Seleccione una condición", "warning");
        return;
    }

    window.open("fpdf/ERlectores.php?condicion=" + cond);
}

function Consultar(cond) {
    $.ajax({
        data: {condicion: cond, accion: "CONSULTAR"},
        url: ruta,
        type: "post",
        dataType: "json",
        success: function (data) {
            let html = "";
            $.each(data, function (i, x) {
                html += `
                <tr>
                    <td>${x.id_lector}</td>
                    <td>${x.nom_lector}</td>
                    <td>${x.direccion}</td>
                    <td>${x.telefono}</td>
                    <td>${x.condicion}</td>
                    <td>${x.fecha_registro}</td>
                </tr>`;
            });

            $("#dtERLectores").DataTable().destroy();

            $("#datos").html(html);

            grid("#dtERLectores");
        }
    });
}

$("#cond").change(function () {
    let cond = $(this).val();
    if (cond !== "") Consultar(cond);
});
function SeleccionarCondicion(valor) {
    $("#cond").val(valor);
    $("#ACondicionLector").modal("hide");
    Consultar(valor);
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}