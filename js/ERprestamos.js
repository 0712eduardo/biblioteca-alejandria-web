<<<<<<< HEAD
let ruta = "../controladores/ERprestamosControlador.php";

function limpiar() {
    $("#mes").val("");
    $("#anio").val("");
    $("#periodo_texto").val("");
    $("#datos").html("");

    if ($.fn.DataTable.isDataTable("#dtERPrestamos")) {
        $("#dtERPrestamos").DataTable().destroy();
    }
}

function SeleccionarPeriodo() {
    let mes = $("#mes_modal").val();
    let anio = $("#anio_modal").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Debe seleccionar mes y año", "warning");
        return;
    }

    let nombreMes = $("#mes_modal option:selected").text();
    $("#periodo_texto").val(nombreMes + " - " + anio);

    $("#mes").val(mes);
    $("#anio").val(anio);

    $("#APrestamoPeriodo").modal("hide");

    Consultar();
}

function r_prestamos() {
    let mes  = $("#mes").val();
    let anio = $("#anio").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un periodo", "warning");
        return;
    }

    window.open("fpdf/ERprestamos.php?mes=" + mes + "&anio=" + anio);
}

function Consultar() {
    let mes  = $("#mes").val();
    let anio = $("#anio").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un periodo", "warning");
        return;
    }

    $.ajax({
        data: { mes: mes, anio: anio, accion: "CONSULTAR" },
        url: ruta,
        type: "post",
        dataType: "json",
        success: function (data) {
            let html = "";

            $.each(data, function (i, x) {
                html += `
                <tr>
                    <td>${x.idprestamo}</td>
                    <td>${x.titulo}</td>
                    <td>${x.nom_lector}</td>
                    <td>${x.fechaPrestamo}</td>
                    <td>${x.fechaDevolucion}</td>
                    <td>${x.cantidad}</td>
                    <td>${x.condicion}</td>
                </tr>`;
            });

            if ($.fn.DataTable.isDataTable("#dtERPrestamos")) {
                $("#dtERPrestamos").DataTable().destroy();
            }

            $("#datos").html(html);
            grid("#dtERPrestamos");
        }
    });
=======
let ruta = "../controladores/ERprestamosControlador.php";

function limpiar() {
    $("#mes").val("");
    $("#anio").val("");
    $("#periodo_texto").val("");
    $("#datos").html("");

    if ($.fn.DataTable.isDataTable("#dtERPrestamos")) {
        $("#dtERPrestamos").DataTable().destroy();
    }
}

function SeleccionarPeriodo() {
    let mes = $("#mes_modal").val();
    let anio = $("#anio_modal").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Debe seleccionar mes y año", "warning");
        return;
    }

    let nombreMes = $("#mes_modal option:selected").text();
    $("#periodo_texto").val(nombreMes + " - " + anio);

    $("#mes").val(mes);
    $("#anio").val(anio);

    $("#APrestamoPeriodo").modal("hide");

    Consultar();
}

function r_prestamos() {
    let mes  = $("#mes").val();
    let anio = $("#anio").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un periodo", "warning");
        return;
    }

    window.open("fpdf/ERprestamos.php?mes=" + mes + "&anio=" + anio);
}

function Consultar() {
    let mes  = $("#mes").val();
    let anio = $("#anio").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un periodo", "warning");
        return;
    }

    $.ajax({
        data: { mes: mes, anio: anio, accion: "CONSULTAR" },
        url: ruta,
        type: "post",
        dataType: "json",
        success: function (data) {
            let html = "";

            $.each(data, function (i, x) {
                html += `
                <tr>
                    <td>${x.idprestamo}</td>
                    <td>${x.titulo}</td>
                    <td>${x.nom_lector}</td>
                    <td>${x.fechaPrestamo}</td>
                    <td>${x.fechaDevolucion}</td>
                    <td>${x.cantidad}</td>
                    <td>${x.condicion}</td>
                </tr>`;
            });

            if ($.fn.DataTable.isDataTable("#dtERPrestamos")) {
                $("#dtERPrestamos").DataTable().destroy();
            }

            $("#datos").html(html);
            grid("#dtERPrestamos");
        }
    });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}