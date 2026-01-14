<<<<<<< HEAD
<?php
require_once '../modelos/libroModelo.php';
require_once '../modelos/conexion.php';

if ($_POST) {

    $lib = new Libros();
    $conex = new Conexion();
    header("Content-Type: text/plain");

    switch ($_POST['accion']) {

        case "CONSULTAR":
            echo json_encode($lib->listar_libros());
            exit;

        case "NUEVO":
            $portada = "";

            if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_OK) {

                if (!is_dir("../uploads/libros/")) {
                    mkdir("../uploads/libros/", 0777, true);
                }

                $portada = time() . "_" . basename($_FILES['portada']['name']);
                move_uploaded_file($_FILES['portada']['tmp_name'], "../uploads/libros/" . $portada);
            }

            echo $lib->agregar_libro(
                strtoupper($_POST['titulo']),
                strtoupper($_POST['autor']),
                $portada,
                $_POST['anio'],
                $_POST['id_categoria'],
                $_POST['stock_total'],
                $_POST['stock_disponible'],
                strtoupper($_POST['condicion'])
            );
            exit;

        case "CONSULTAR_ID":
            echo json_encode($lib->consultarPorId($_POST['idLibro']));
            exit;

        case "MODIFICAR":
            $idLibro = $_POST['idLibro'];
            $actual = $lib->consultarPorId($idLibro);
            $portada = $actual->portada;

            if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_OK) {

                if (!is_dir("../uploads/libros/")) {
                    mkdir("../uploads/libros/", 0777, true);
                }

                $nuevoNombre = time() . "_" . basename($_FILES['portada']['name']);
                move_uploaded_file($_FILES['portada']['tmp_name'], "../uploads/libros/" . $nuevoNombre);

                if ($actual->portada && file_exists("../uploads/libros/" . $actual->portada)) {
                    unlink("../uploads/libros/" . $actual->portada);
                }

                $portada = $nuevoNombre;
            }

            echo $lib->modificar_libro(
                $idLibro,
                strtoupper($_POST['titulo']),
                strtoupper($_POST['autor']),
                $portada,
                $_POST['anio'],
                $_POST['id_categoria'],
                $_POST['stock_total'],
                $_POST['stock_disponible'],
                strtoupper($_POST['condicion'])
            );
            exit;

        case "ELIMINAR":
            echo $lib->eliminar_libro(
                $_POST['idLibro'],
                strtoupper($_POST['condicion'])
            );
            exit;
    }
}
=======
<?php
require_once '../modelos/libroModelo.php';
require_once '../modelos/conexion.php';

if ($_POST) {

    $lib = new Libros();
    $conex = new Conexion();
    header("Content-Type: text/plain");

    switch ($_POST['accion']) {

        case "CONSULTAR":
            echo json_encode($lib->listar_libros());
            exit;

        case "NUEVO":
            $portada = "";

            if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_OK) {

                if (!is_dir("../uploads/libros/")) {
                    mkdir("../uploads/libros/", 0777, true);
                }

                $portada = time() . "_" . basename($_FILES['portada']['name']);
                move_uploaded_file($_FILES['portada']['tmp_name'], "../uploads/libros/" . $portada);
            }

            echo $lib->agregar_libro(
                strtoupper($_POST['titulo']),
                strtoupper($_POST['autor']),
                $portada,
                $_POST['anio'],
                $_POST['id_categoria'],
                $_POST['stock_total'],
                $_POST['stock_disponible'],
                strtoupper($_POST['condicion'])
            );
            exit;

        case "CONSULTAR_ID":
            echo json_encode($lib->consultarPorId($_POST['idLibro']));
            exit;

        case "MODIFICAR":
            $idLibro = $_POST['idLibro'];
            $actual = $lib->consultarPorId($idLibro);
            $portada = $actual->portada;

            if (isset($_FILES['portada']) && $_FILES['portada']['error'] === UPLOAD_ERR_OK) {

                if (!is_dir("../uploads/libros/")) {
                    mkdir("../uploads/libros/", 0777, true);
                }

                $nuevoNombre = time() . "_" . basename($_FILES['portada']['name']);
                move_uploaded_file($_FILES['portada']['tmp_name'], "../uploads/libros/" . $nuevoNombre);

                if ($actual->portada && file_exists("../uploads/libros/" . $actual->portada)) {
                    unlink("../uploads/libros/" . $actual->portada);
                }

                $portada = $nuevoNombre;
            }

            echo $lib->modificar_libro(
                $idLibro,
                strtoupper($_POST['titulo']),
                strtoupper($_POST['autor']),
                $portada,
                $_POST['anio'],
                $_POST['id_categoria'],
                $_POST['stock_total'],
                $_POST['stock_disponible'],
                strtoupper($_POST['condicion'])
            );
            exit;

        case "ELIMINAR":
            echo $lib->eliminar_libro(
                $_POST['idLibro'],
                strtoupper($_POST['condicion'])
            );
            exit;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>