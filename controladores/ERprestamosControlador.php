<<<<<<< HEAD
<?php
require_once "../modelos/ERprestamosModelo.php";

if ($_POST) {
    $er = new ERprestamos();

    switch ($_POST["accion"]) {
        case "CONSULTAR":
            $mes  = isset($_POST["mes"])  ? $_POST["mes"]  : 0;
            $anio = isset($_POST["anio"]) ? $_POST["anio"] : 0;

            echo json_encode($er->consultarPorMesAnio($mes, $anio));
            break;
    }
}
=======
<?php
require_once "../modelos/ERprestamosModelo.php";

if ($_POST) {
    $er = new ERprestamos();

    switch ($_POST["accion"]) {
        case "CONSULTAR":
            $mes  = isset($_POST["mes"])  ? $_POST["mes"]  : 0;
            $anio = isset($_POST["anio"]) ? $_POST["anio"] : 0;

            echo json_encode($er->consultarPorMesAnio($mes, $anio));
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>