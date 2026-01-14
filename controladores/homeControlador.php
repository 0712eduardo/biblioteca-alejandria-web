<<<<<<< HEAD
<?php
require_once '../modelos/homeModelo.php';

$home = new HomeModelo();

if ($_POST) {
    switch ($_POST["accion"]) {

        case "ULTIMOS":
            echo json_encode($home->ultimosPrestamos());
            break;

        case "GRAFICO":
            $anio = $_POST["anio"];
            echo json_encode($home->prestamosPorMes($anio));
            break;
    }
}
=======
<?php
require_once '../modelos/homeModelo.php';

$home = new HomeModelo();

if ($_POST) {
    switch ($_POST["accion"]) {

        case "ULTIMOS":
            echo json_encode($home->ultimosPrestamos());
            break;

        case "GRAFICO":
            $anio = $_POST["anio"];
            echo json_encode($home->prestamosPorMes($anio));
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>