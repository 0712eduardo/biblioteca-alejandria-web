<<<<<<< HEAD
<?php
require_once '../modelos/lectorModelo.php';

if ($_POST) {
    $lec = new Lectores();

    switch ($_POST['accion']) {
        case "CONSULTAR":
            echo json_encode($lec->listar_lectores());
            break;

        case "NUEVO":
            $n = strtoupper($_POST['nom']);
            $d = strtoupper($_POST['dir']);
            $t = $_POST['tel'];
            $c = strtoupper($_POST['con']);
            echo json_encode($lec->agregar_lector($n, $d, $t, $c));
            break;

        case "CONSULTAR_ID":
            echo json_encode($lec->ConsultarPorId($_POST['idLector']));
            break;

        case "MODIFICAR":
            $n = strtoupper($_POST['nom']);
            $d = strtoupper($_POST['dir']);
            $t = $_POST['tel'];
            $c = strtoupper($_POST['con']);
            $id = $_POST['idLector'];
            echo json_encode($lec->Modifica_Lector($id, $n, $d, $t, $c));
            break;

        case "ELIMINAR":
            $c = strtoupper($_POST['condicion']);
            echo json_encode($lec->Eliminar($_POST['idLector'], $c));
            break;
    }
}
?>
=======
<?php
require_once '../modelos/lectorModelo.php';

if ($_POST) {
    $lec = new Lectores();

    switch ($_POST['accion']) {
        case "CONSULTAR":
            echo json_encode($lec->listar_lectores());
            break;

        case "NUEVO":
            $n = strtoupper($_POST['nom']);
            $d = strtoupper($_POST['dir']);
            $t = $_POST['tel'];
            $c = strtoupper($_POST['con']);
            echo json_encode($lec->agregar_lector($n, $d, $t, $c));
            break;

        case "CONSULTAR_ID":
            echo json_encode($lec->ConsultarPorId($_POST['idLector']));
            break;

        case "MODIFICAR":
            $n = strtoupper($_POST['nom']);
            $d = strtoupper($_POST['dir']);
            $t = $_POST['tel'];
            $c = strtoupper($_POST['con']);
            $id = $_POST['idLector'];
            echo json_encode($lec->Modifica_Lector($id, $n, $d, $t, $c));
            break;

        case "ELIMINAR":
            $c = strtoupper($_POST['condicion']);
            echo json_encode($lec->Eliminar($_POST['idLector'], $c));
            break;
    }
}
?>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
