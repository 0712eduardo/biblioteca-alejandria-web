<<<<<<< HEAD
<?php
require_once '../modelos/prestamoModelo.php';
require_once '../modelos/conexion.php';

if ($_POST) {
    $p = new Prestamos();
    $conex = new Conexion();

    switch ($_POST['accion']) {

        case "CONSULTAR":
            echo json_encode($p->listar_prestamos());
            break;

        case "NUEVO":
            echo json_encode($p->agregar_prestamo(
                intval($_POST['id_libro']),
                intval($_POST['id_lector']),
                $_POST['fechaPrestamo'],
                $_POST['fechaDevolucion'],
                intval($_POST['cantidad']),
                strtoupper($_POST['condicion'])
            ));
            break;

        case "CONSULTAR_ID":
            echo json_encode($p->consultarPorId($_POST['idPrestamo']));
            break;

        case "MODIFICAR":
            echo json_encode($p->modificar_prestamo(
                intval($_POST['idPrestamo']),
                intval($_POST['id_libro']),
                intval($_POST['id_lector']),
                $_POST['fechaPrestamo'],
                $_POST['fechaDevolucion'],
                intval($_POST['cantidad']),
                strtoupper($_POST['condicion'])
            ));
            break;

        case "ELIMINAR":
            echo json_encode($p->eliminar_prestamo(
                intval($_POST['idPrestamo']),
                strtoupper($_POST['condicion'])
            ));
            break;
    }
}
=======
<?php
require_once '../modelos/prestamoModelo.php';
require_once '../modelos/conexion.php';

if ($_POST) {
    $p = new Prestamos();
    $conex = new Conexion();

    switch ($_POST['accion']) {

        case "CONSULTAR":
            echo json_encode($p->listar_prestamos());
            break;

        case "NUEVO":
            echo json_encode($p->agregar_prestamo(
                intval($_POST['id_libro']),
                intval($_POST['id_lector']),
                $_POST['fechaPrestamo'],
                $_POST['fechaDevolucion'],
                intval($_POST['cantidad']),
                strtoupper($_POST['condicion'])
            ));
            break;

        case "CONSULTAR_ID":
            echo json_encode($p->consultarPorId($_POST['idPrestamo']));
            break;

        case "MODIFICAR":
            echo json_encode($p->modificar_prestamo(
                intval($_POST['idPrestamo']),
                intval($_POST['id_libro']),
                intval($_POST['id_lector']),
                $_POST['fechaPrestamo'],
                $_POST['fechaDevolucion'],
                intval($_POST['cantidad']),
                strtoupper($_POST['condicion'])
            ));
            break;

        case "ELIMINAR":
            echo json_encode($p->eliminar_prestamo(
                intval($_POST['idPrestamo']),
                strtoupper($_POST['condicion'])
            ));
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>