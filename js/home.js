<<<<<<< HEAD
let rutaHome = "../controladores/homeControlador.php";
let graficoPrestamos = null;

$(document).ready(function () {
    cargarUltimosPrestamos();
    cargarGrafico();

    
    $("#anioSelect").on("change", function () {
        cargarGrafico();
    });
});


function cargarUltimosPrestamos() {
    $.ajax({
        url: rutaHome,
        type: "POST",
        data: { accion: "ULTIMOS" },
        dataType: "json",
        success: function (data) {
            let html = "";

            $.each(data, function (i, x) {
                let portada = (x.portada && x.portada !== "")
                    ? `../uploads/libros/${x.portada}`
                    : `../uploads/noimage.png`;

                html += `
                    <tr>
                        <td>${x.idprestamo}</td>
                        <td class="text-center">
                            <img src="${portada}" 
                                 class="img-tabla"
                                 onclick="verPortada('${portada}')">
                        </td>
                        <td>${x.titulo}</td>
                        <td>${x.nom_lector}</td>
                        <td>${x.fechaPrestamo}</td>
                        <td>${x.fechaDevolucion}</td>
                        <td>${x.cantidad}</td>
                        <td>${x.condicion}</td>
                    </tr>
                `;
            });

            $("#tablaPrestamos").html(html);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar últimos préstamos:", error);
        }
    });
}


function verPortada(rutaImagen) {
    $("#imgPortadaFull").attr("src", rutaImagen);
    $("#modalPortada").modal("show");
}


function cargarGrafico() {
    let anio = $("#anioSelect").val();

    $.ajax({
        url: rutaHome,
        type: "POST",
        data: { accion: "GRAFICO", anio: anio },
        dataType: "json",
        success: function (data) {

            let total = [];
            for (let i = 1; i <= 12; i++) {
                let encontrado = data.find(x => x.mes == i);
                total.push(encontrado ? parseInt(encontrado.total) : 0);
            }

            if (graficoPrestamos) {
                graficoPrestamos.destroy();
            }

            graficoPrestamos = new Chart(document.getElementById("graficoPrestamos"), {
                type: "bar",
                data: {
                    labels: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
                    datasets: [{
                        label: "Préstamos por mes",
                        data: total,
                        backgroundColor: "#c79c22"
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: {
                        legend: {
                            labels: { color: "#fff" }
                        }
                    }
                }
            });
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar gráfico:", error);
        }
    });
}
=======
let rutaHome = "../controladores/homeControlador.php";
let graficoPrestamos = null;

$(document).ready(function () {
    cargarUltimosPrestamos();
    cargarGrafico();

    
    $("#anioSelect").on("change", function () {
        cargarGrafico();
    });
});


function cargarUltimosPrestamos() {
    $.ajax({
        url: rutaHome,
        type: "POST",
        data: { accion: "ULTIMOS" },
        dataType: "json",
        success: function (data) {
            let html = "";

            $.each(data, function (i, x) {
                let portada = (x.portada && x.portada !== "")
                    ? `../uploads/libros/${x.portada}`
                    : `../uploads/noimage.png`;

                html += `
                    <tr>
                        <td>${x.idprestamo}</td>
                        <td class="text-center">
                            <img src="${portada}" 
                                 class="img-tabla"
                                 onclick="verPortada('${portada}')">
                        </td>
                        <td>${x.titulo}</td>
                        <td>${x.nom_lector}</td>
                        <td>${x.fechaPrestamo}</td>
                        <td>${x.fechaDevolucion}</td>
                        <td>${x.cantidad}</td>
                        <td>${x.condicion}</td>
                    </tr>
                `;
            });

            $("#tablaPrestamos").html(html);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar últimos préstamos:", error);
        }
    });
}


function verPortada(rutaImagen) {
    $("#imgPortadaFull").attr("src", rutaImagen);
    $("#modalPortada").modal("show");
}


function cargarGrafico() {
    let anio = $("#anioSelect").val();

    $.ajax({
        url: rutaHome,
        type: "POST",
        data: { accion: "GRAFICO", anio: anio },
        dataType: "json",
        success: function (data) {

            let total = [];
            for (let i = 1; i <= 12; i++) {
                let encontrado = data.find(x => x.mes == i);
                total.push(encontrado ? parseInt(encontrado.total) : 0);
            }

            if (graficoPrestamos) {
                graficoPrestamos.destroy();
            }

            graficoPrestamos = new Chart(document.getElementById("graficoPrestamos"), {
                type: "bar",
                data: {
                    labels: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
                    datasets: [{
                        label: "Préstamos por mes",
                        data: total,
                        backgroundColor: "#c79c22"
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: {
                        legend: {
                            labels: { color: "#fff" }
                        }
                    }
                }
            });
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar gráfico:", error);
        }
    });
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
