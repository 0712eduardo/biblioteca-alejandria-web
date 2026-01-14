<<<<<<< HEAD
<?php
require_once "../modelos/ERfacturaModelo.php";

if ($_POST) {
    $er = new ERfactura();

    switch ($_POST["accion"]) {
        case "CONSULTAR":
            $mes    = isset($_POST["mes"]) ? $_POST["mes"] : 0;
            $anio   = isset($_POST["anio"]) ? $_POST["anio"] : 0;
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "TODOS";

            $data = $er->consultarPorPeriodoEstado($mes, $anio, $estado);
            echo json_encode($data);
            break;
    }
}
=======
<?php
require_once "../modelos/ERfacturaModelo.php";

if ($_POST) {
    $er = new ERfactura();

    switch ($_POST["accion"]) {
        case "CONSULTAR":
            $mes    = isset($_POST["mes"]) ? $_POST["mes"] : 0;
            $anio   = isset($_POST["anio"]) ? $_POST["anio"] : 0;
            $estado = isset($_POST["estado"]) ? $_POST["estado"] : "TODOS";

            $data = $er->consultarPorPeriodoEstado($mes, $anio, $estado);
            echo json_encode($data);
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>