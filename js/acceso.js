<<<<<<< HEAD
let ruta = "../controladores/accesoControlador.php";  

function Acceso() {
    let usuario = $("#usu").val().trim();
    let contrasena = $("#pass").val().trim();

    if (usuario == "") {  
        MostrarAlerta("ALERTA", "Debe ingresar el usuario", "error");  
        return;  
    }  
    if (contrasena == "") {  
        MostrarAlerta("ALERTA", "Debe ingresar la contraseña", "error");  
        return;  
    }  

    $.ajax({  
        data: { usuario: usuario, contrasena: contrasena },  
        url: ruta,  
        type: "post",  
        dataType: "json",  
        success: function (data) {  
            if (data.resultado === "OK") {
                Swal.fire({
                    title: "Bienvenido " + data.nombre,
                    text: "Has iniciado sesión correctamente.",
                    icon: "success",
                    confirmButtonText: "Continuar",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location = "home.php";
                });

            } else if (data.resultado === "INACTIVO") {
                MostrarAlerta("INACTIVO", data.mensaje, "warning");
                $("#usu").val("");
                $("#pass").val("");

            } else {
                MostrarAlerta("ERROR", data.mensaje, "error");
                $("#usu").val("");
                $("#pass").val("");
            }
        },  
        error: function () {  
            MostrarAlerta("ERROR", "Error de conexión con el servidor", "error");  
        }  
    });  
}  

function MostrarAlerta(titulo, mensaje, tipo) {  
    Swal.fire({  
        position: "center",  
        icon: tipo,  
        title: titulo,  
        text: mensaje,  
        iconColor: "#6592ff",  
        showConfirmButton: false,  
        timer: 1500,  
    });  
=======
let ruta = "../controladores/accesoControlador.php";  

function Acceso() {
    let usuario = $("#usu").val().trim();
    let contrasena = $("#pass").val().trim();

    if (usuario == "") {  
        MostrarAlerta("ALERTA", "Debe ingresar el usuario", "error");  
        return;  
    }  
    if (contrasena == "") {  
        MostrarAlerta("ALERTA", "Debe ingresar la contraseña", "error");  
        return;  
    }  

    $.ajax({  
        data: { usuario: usuario, contrasena: contrasena },  
        url: ruta,  
        type: "post",  
        dataType: "json",  
        success: function (data) {  
            if (data.resultado === "OK") {
                Swal.fire({
                    title: "Bienvenido " + data.nombre,
                    text: "Has iniciado sesión correctamente.",
                    icon: "success",
                    confirmButtonText: "Continuar",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location = "home.php";
                });

            } else if (data.resultado === "INACTIVO") {
                MostrarAlerta("INACTIVO", data.mensaje, "warning");
                $("#usu").val("");
                $("#pass").val("");

            } else {
                MostrarAlerta("ERROR", data.mensaje, "error");
                $("#usu").val("");
                $("#pass").val("");
            }
        },  
        error: function () {  
            MostrarAlerta("ERROR", "Error de conexión con el servidor", "error");  
        }  
    });  
}  

function MostrarAlerta(titulo, mensaje, tipo) {  
    Swal.fire({  
        position: "center",  
        icon: tipo,  
        title: titulo,  
        text: mensaje,  
        iconColor: "#6592ff",  
        showConfirmButton: false,  
        timer: 1500,  
    });  
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}