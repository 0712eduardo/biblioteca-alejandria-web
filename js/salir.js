<<<<<<< HEAD
function salir() {
    Swal.fire({
        title: "Salir del sistema",
        text: "¿Está seguro que desea salir?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, salir",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "../salir.php?s=1";
        }
    });
=======
function salir() {
    Swal.fire({
        title: "Salir del sistema",
        text: "¿Está seguro que desea salir?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, salir",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "../salir.php?s=1";
        }
    });
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
}