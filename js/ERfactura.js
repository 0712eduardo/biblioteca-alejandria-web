<<<<<<< HEAD
let rutaFactura = "../controladores/ERfacturaControlador.php";

function limpiarFactura() {
    $("#mes_fact").val("");
    $("#anio_fact").val("");
    $("#estado_fact").val("TODOS");
    $("#periodo_fact_texto").val("");
    $("#datosFactura").html("");

    if ($.fn.DataTable.isDataTable("#dtERFactura")) {
        $("#dtERFactura").DataTable().destroy();
    }
}

function SeleccionarPeriodoFactura() {
    let mes    = $("#mes_fact_modal").val();
    let anio   = $("#anio_fact_modal").val();
    let estado = $("#estado_fact_modal").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Debe seleccionar mes y año", "warning");
        return;
    }

    let nombreMes = $("#mes_fact_modal option:selected").text();
    let textoEstado = $("#estado_fact_modal option:selected").text();

    $("#mes_fact").val(mes);
    $("#anio_fact").val(anio);
    $("#estado_fact").val(estado);
    $("#periodo_fact_texto").val(nombreMes + " - " + anio + " / " + textoEstado.toUpperCase());

    $("#AFacturaPeriodo").modal("hide");

    ConsultarFactura();
}

function r_facturas() {
    let mes    = $("#mes_fact").val();
    let anio   = $("#anio_fact").val();
    let estado = $("#estado_fact").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un período", "warning");
        return;
    }

    window.open("fpdf/ERfactura.php?mes=" + mes + "&anio=" + anio + "&estado=" + estado);
}

function ConsultarFactura() {
    let mes    = $("#mes_fact").val();
    let anio   = $("#anio_fact").val();
    let estado = $("#estado_fact").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un período", "warning");
        return;
    }

    $.ajax({
        data: { mes: mes, anio: anio, estado: estado, accion: "CONSULTAR" },
        url: rutaFactura,
        type: "post",
        dataType: "json",
        success: function (data) {
            let html = "";

            $.each(data, function (i, f) {

                let badgeEstado = "";
                if (f.estado_dinamico === "VENCIDO") {
                    badgeEstado = "<span class='badge bg-danger'>VENCIDO</span>";
                } else {
                    badgeEstado = "<span class='badge bg-success'>VIGENTE</span>";
                }

                html += `
                <tr>
                    <td>${f.id_factura}</td>
                    <td>${f.nom_lector}</td>
                    <td>${f.titulo}</td>
                    <td>${f.fechaPrestamo}</td>
                    <td>${f.fechaDevolucion}</td>
                    <td>${f.fechaFactura}</td>
                    <td>${f.subtotal}</td>
                    <td>${f.igv}</td>
                    <td>${f.total}</td>
                    <td>${badgeEstado}</td>
                </tr>`;
            });

            if ($.fn.DataTable.isDataTable("#dtERFactura")) {
                $("#dtERFactura").DataTable().destroy();
            }

            $("#datosFactura").html(html);
            grid("#dtERFactura");
        }
    });
=======
let rutaFactura = "../controladores/ERfacturaControlador.php";

function limpiarFactura() {
    $("#mes_fact").val("");
    $("#anio_fact").val("");
    $("#estado_fact").val("TODOS");
    $("#periodo_fact_texto").val("");
    $("#datosFactura").html("");

    if ($.fn.DataTable.isDataTable("#dtERFactura")) {
        $("#dtERFactura").DataTable().destroy();
    }
}

function SeleccionarPeriodoFactura() {
    let mes    = $("#mes_fact_modal").val();
    let anio   = $("#anio_fact_modal").val();
    let estado = $("#estado_fact_modal").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Debe seleccionar mes y año", "warning");
        return;
    }

    let nombreMes = $("#mes_fact_modal option:selected").text();
    let textoEstado = $("#estado_fact_modal option:selected").text();

    $("#mes_fact").val(mes);
    $("#anio_fact").val(anio);
    $("#estado_fact").val(estado);
    $("#periodo_fact_texto").val(nombreMes + " - " + anio + " / " + textoEstado.toUpperCase());

    $("#AFacturaPeriodo").modal("hide");

    ConsultarFactura();
}

function r_facturas() {
    let mes    = $("#mes_fact").val();
    let anio   = $("#anio_fact").val();
    let estado = $("#estado_fact").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un período", "warning");
        return;
    }

    window.open("fpdf/ERfactura.php?mes=" + mes + "&anio=" + anio + "&estado=" + estado);
}

function ConsultarFactura() {
    let mes    = $("#mes_fact").val();
    let anio   = $("#anio_fact").val();
    let estado = $("#estado_fact").val();

    if (mes === "" || anio === "") {
        MostrarAlerta("ALERTA", "Seleccione un período", "warning");
        return;
    }

    $.ajax({
        data: { mes: mes, anio: anio, estado: estado, accion: "CONSULTAR" },
        url: rutaFactura,
        type: "post",
        dataType: "json",
        success: function (data) {
            let html = "";

            $.each(data, function (i, f) {

                let badgeEstado = "";
                if (f.estado_dinamico === "VENCIDO") {
                    badgeEstado = "<span class='badge bg-danger'>VENCIDO</span>";
                } else {
                    badgeEstado = "<span class='badge bg-success'>VIGENTE</span>";
                }

                html += `
                <tr>
                    <td>${f.id_factura}</td>
                    <td>${f.nom_lector}</td>
                    <td>${f.titulo}</td>
                    <td>${f.fechaPrestamo}</td>
                    <td>${f.fechaDevolucion}</td>
                    <td>${f.fechaFactura}</td>
                    <td>${f.subtotal}</td>
                    <td>${f.igv}</td>
                    <td>${f.total}</td>
                    <td>${badgeEstado}</td>
                </tr>`;
            });

            if ($.fn.DataTable.isDataTable("#dtERFactura")) {
                $("#dtERFactura").DataTable().destroy();
            }

            $("#datosFactura").html(html);
            grid("#dtERFactura");
        }
    });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}