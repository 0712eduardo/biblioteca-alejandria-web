<<<<<<< HEAD
<?php
require_once "../modelos/ERlectoresModelo.php";

if ($_POST) {
    $er = new ERlectores();

    switch ($_POST["accion"]) {
        case "CONSULTAR":
            echo json_encode($er->consultar($_POST["condicion"]));
            break;
    }
}
=======
<?php
require_once "../modelos/ERlectoresModelo.php";

if ($_POST) {
    $er = new ERlectores();

    switch ($_POST["accion"]) {
        case "CONSULTAR":
            echo json_encode($er->consultar($_POST["condicion"]));
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>