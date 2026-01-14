<<<<<<< HEAD
let ruta = "../controladores/libroControlador.php";

$(document).ready(function () {
    Consultar();
});

function limpiar() {
    $("#titulo, #autor, #anio, #stock_total, #stock_disponible").val("");
    $("#id_categoria, #condicion").val("-- Seleccione --");
    $("#portada").val("");
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

                let portada = d.portada 
                    ? `<img src="../uploads/libros/${d.portada}" class="img-thumbnail" style="width:60px;height:80px;">`
                    : `<img src="../uploads/noimage.png" class="img-thumbnail" style="width:60px;height:80px;">`;

                let badge = (d.condicion == "ACTIVO")
                    ? "<span class='badge-activo'>ACTIVO</span>"
                    : "<span class='badge-desactivo'>DESACTIVO</span>";

                html += `
                    <tr>
                        <td>${d.id_libro}</td>
                        <td>${portada}</td>
                        <td>${d.titulo}</td>
                        <td>${d.autor}</td>
                        <td>${d.nombre_categoria}</td>
                        <td>${d.anio}</td>
                        <td>${d.stock_total}</td>
                        <td>${d.stock_disponible}</td>
                        <td>${badge}</td>
                        <td>
                            <button class='btn btn-accion-edit' data-bs-toggle='modal'
                                data-bs-target='#EditarLibro'
                                onclick='Libro_id(${d.id_libro})'>
                                <i class='mdi mdi-pencil'></i>
                            </button>

                            <button class='btn btn-accion-delete' onclick='MostrarAlertaE(${d.id_libro})'>
                                <i class='mdi mdi-delete'></i>
                            </button>
                        </td>
                    </tr>
                `;
            });

            $("#datos").html(html);
            grid("#dtLibro");
        }
    });
}

function Agregar() {

    if (
        $("#titulo").val().trim() === "" ||
        $("#autor").val().trim() === "" ||
        $("#anio").val() === "" ||
        $("#id_categoria").val() === "-- Seleccione --" ||
        $("#stock_total").val().trim() === "" ||
        $("#stock_disponible").val().trim() === "" ||
        $("#condicion").val() === "-- Seleccione --"
    ) {
        MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
        return;
    }
    let formData = new FormData();
    formData.append("accion", "NUEVO");
    formData.append("titulo", $("#titulo").val());
    formData.append("autor", $("#autor").val());
    formData.append("anio", $("#anio").val());
    formData.append("id_categoria", $("#id_categoria").val());
    formData.append("stock_total", $("#stock_total").val());
    formData.append("stock_disponible", $("#stock_disponible").val());
    formData.append("condicion", $("#condicion").val());
    formData.append("portada", $("#portada")[0].files[0]);

    $.ajax({
        url: ruta,
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            data = data.trim(); 

            if (data === "OK") {
                $("#AgregarLibro").modal("toggle");
                MostrarAlerta("Éxito", "Libro agregado con éxito", "success");
                limpiar();
                $("#dtLibro").DataTable().destroy();
                Consultar();
            } else {
                MostrarAlerta("Error", data, "error");
            }
        }
    });
}

function Libro_id(id) {
    $.ajax({
        data: { idLibro: id, accion: "CONSULTAR_ID" },
        url: ruta,
        type: "post",
        dataType: "json",
        success: function (d) {
            $("#idLibro").val(d.id_libro);
            $("#Etitulo").val(d.titulo);
            $("#Eautor").val(d.autor);
            $("#Eanio").val(d.anio);
            $("#Eid_categoria").val(d.id_categoria);
            $("#Estock_total").val(d.stock_total);
            $("#Estock_disponible").val(d.stock_disponible);
            $("#Econdicion").val(d.condicion);

            $("#PreviewPortada").attr("src",
                d.portada ? "../uploads/libros/" + d.portada : "../uploads/noimage.png"
            );
        }
    });
}

function Editar() {
if (
    $("#Etitulo").val().trim() === "" ||
    $("#Eautor").val().trim() === "" ||
    $("#Eanio").val() === "" ||
    $("#Eid_categoria").val() === "-- Seleccione --" ||
    $("#Estock_total").val().trim() === "" ||
    $("#Estock_disponible").val().trim() === "" ||
    $("#Econdicion").val() === "-- Seleccione --"
) {
    MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
    return;
}
    let formData = new FormData();
    formData.append("accion", "MODIFICAR");
    formData.append("idLibro", $("#idLibro").val());
    formData.append("titulo", $("#Etitulo").val());
    formData.append("autor", $("#Eautor").val());
    formData.append("anio", $("#Eanio").val());
    formData.append("id_categoria", $("#Eid_categoria").val());
    formData.append("stock_total", $("#Estock_total").val());
    formData.append("stock_disponible", $("#Estock_disponible").val());
    formData.append("condicion", $("#Econdicion").val());
    formData.append("portada", $("#Eportada")[0].files[0]);

    $.ajax({
        url: ruta,
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            data = data.trim();

            if (data === "OK") {
                $("#EditarLibro").modal("toggle");
                MostrarAlerta("Éxito", "Libro actualizado correctamente", "success");
                $("#dtLibro").DataTable().destroy();
                Consultar();
            } else {
                MostrarAlerta("Error", data, "error");
            }
        }
    });
}

function Eliminar(id) {
    $.ajax({
        data: { idLibro: id, accion: "ELIMINAR", condicion: "INACTIVO" },
        url: ruta,
        type: "post",
        success: function (data) {

            data = data.trim();

            if (data === "OK") {
                MostrarAlerta("Éxito", "Libro desactivado correctamente", "success");
            } else {
                MostrarAlerta("Error", data, "error");
            }

            $("#dtLibro").DataTable().destroy();
            Consultar();
        }
    });
=======
let ruta = "../controladores/libroControlador.php";

$(document).ready(function () {
    Consultar();
});

function limpiar() {
    $("#titulo, #autor, #anio, #stock_total, #stock_disponible").val("");
    $("#id_categoria, #condicion").val("-- Seleccione --");
    $("#portada").val("");
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

                let portada = d.portada 
                    ? `<img src="../uploads/libros/${d.portada}" class="img-thumbnail" style="width:60px;height:80px;">`
                    : `<img src="../uploads/noimage.png" class="img-thumbnail" style="width:60px;height:80px;">`;

                let badge = (d.condicion == "ACTIVO")
                    ? "<span class='badge-activo'>ACTIVO</span>"
                    : "<span class='badge-desactivo'>DESACTIVO</span>";

                html += `
                    <tr>
                        <td>${d.id_libro}</td>
                        <td>${portada}</td>
                        <td>${d.titulo}</td>
                        <td>${d.autor}</td>
                        <td>${d.nombre_categoria}</td>
                        <td>${d.anio}</td>
                        <td>${d.stock_total}</td>
                        <td>${d.stock_disponible}</td>
                        <td>${badge}</td>
                        <td>
                            <button class='btn btn-accion-edit' data-bs-toggle='modal'
                                data-bs-target='#EditarLibro'
                                onclick='Libro_id(${d.id_libro})'>
                                <i class='mdi mdi-pencil'></i>
                            </button>

                            <button class='btn btn-accion-delete' onclick='MostrarAlertaE(${d.id_libro})'>
                                <i class='mdi mdi-delete'></i>
                            </button>
                        </td>
                    </tr>
                `;
            });

            $("#datos").html(html);
            grid("#dtLibro");
        }
    });
}

function Agregar() {

    if (
        $("#titulo").val().trim() === "" ||
        $("#autor").val().trim() === "" ||
        $("#anio").val() === "" ||
        $("#id_categoria").val() === "-- Seleccione --" ||
        $("#stock_total").val().trim() === "" ||
        $("#stock_disponible").val().trim() === "" ||
        $("#condicion").val() === "-- Seleccione --"
    ) {
        MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
        return;
    }
    let formData = new FormData();
    formData.append("accion", "NUEVO");
    formData.append("titulo", $("#titulo").val());
    formData.append("autor", $("#autor").val());
    formData.append("anio", $("#anio").val());
    formData.append("id_categoria", $("#id_categoria").val());
    formData.append("stock_total", $("#stock_total").val());
    formData.append("stock_disponible", $("#stock_disponible").val());
    formData.append("condicion", $("#condicion").val());
    formData.append("portada", $("#portada")[0].files[0]);

    $.ajax({
        url: ruta,
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            data = data.trim(); 

            if (data === "OK") {
                $("#AgregarLibro").modal("toggle");
                MostrarAlerta("Éxito", "Libro agregado con éxito", "success");
                limpiar();
                $("#dtLibro").DataTable().destroy();
                Consultar();
            } else {
                MostrarAlerta("Error", data, "error");
            }
        }
    });
}

function Libro_id(id) {
    $.ajax({
        data: { idLibro: id, accion: "CONSULTAR_ID" },
        url: ruta,
        type: "post",
        dataType: "json",
        success: function (d) {
            $("#idLibro").val(d.id_libro);
            $("#Etitulo").val(d.titulo);
            $("#Eautor").val(d.autor);
            $("#Eanio").val(d.anio);
            $("#Eid_categoria").val(d.id_categoria);
            $("#Estock_total").val(d.stock_total);
            $("#Estock_disponible").val(d.stock_disponible);
            $("#Econdicion").val(d.condicion);

            $("#PreviewPortada").attr("src",
                d.portada ? "../uploads/libros/" + d.portada : "../uploads/noimage.png"
            );
        }
    });
}

function Editar() {
if (
    $("#Etitulo").val().trim() === "" ||
    $("#Eautor").val().trim() === "" ||
    $("#Eanio").val() === "" ||
    $("#Eid_categoria").val() === "-- Seleccione --" ||
    $("#Estock_total").val().trim() === "" ||
    $("#Estock_disponible").val().trim() === "" ||
    $("#Econdicion").val() === "-- Seleccione --"
) {
    MostrarAlerta("ALERTA", "Debe llenar todos los campos", "error");
    return;
}
    let formData = new FormData();
    formData.append("accion", "MODIFICAR");
    formData.append("idLibro", $("#idLibro").val());
    formData.append("titulo", $("#Etitulo").val());
    formData.append("autor", $("#Eautor").val());
    formData.append("anio", $("#Eanio").val());
    formData.append("id_categoria", $("#Eid_categoria").val());
    formData.append("stock_total", $("#Estock_total").val());
    formData.append("stock_disponible", $("#Estock_disponible").val());
    formData.append("condicion", $("#Econdicion").val());
    formData.append("portada", $("#Eportada")[0].files[0]);

    $.ajax({
        url: ruta,
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            data = data.trim();

            if (data === "OK") {
                $("#EditarLibro").modal("toggle");
                MostrarAlerta("Éxito", "Libro actualizado correctamente", "success");
                $("#dtLibro").DataTable().destroy();
                Consultar();
            } else {
                MostrarAlerta("Error", data, "error");
            }
        }
    });
}

function Eliminar(id) {
    $.ajax({
        data: { idLibro: id, accion: "ELIMINAR", condicion: "INACTIVO" },
        url: ruta,
        type: "post",
        success: function (data) {

            data = data.trim();

            if (data === "OK") {
                MostrarAlerta("Éxito", "Libro desactivado correctamente", "success");
            } else {
                MostrarAlerta("Error", data, "error");
            }

            $("#dtLibro").DataTable().destroy();
            Consultar();
        }
    });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}