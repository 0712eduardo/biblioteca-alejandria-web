<<<<<<< HEAD
<?php
require_once '../modelos/autorModelo.php';

if ($_POST) {
    $aut = new Autor();

    switch ($_POST['accion']) {
        case "CONSULTAR_AUTORES":
            echo json_encode($aut->listar_autores());
            break;

        case "CONSULTAR_LIBROS_AUTOR":
            echo json_encode($aut->libros_por_autor($_POST['autor']));
            break;
    }
}
=======
<?php
require_once '../modelos/autorModelo.php';

if ($_POST) {
    $aut = new Autor();

    switch ($_POST['accion']) {
        case "CONSULTAR_AUTORES":
            echo json_encode($aut->listar_autores());
            break;

        case "CONSULTAR_LIBROS_AUTOR":
            echo json_encode($aut->libros_por_autor($_POST['autor']));
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>