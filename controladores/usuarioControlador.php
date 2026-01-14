<<<<<<< HEAD
<?php
require_once '../modelos/usuarioModelo.php';

if ($_POST) {
    $usr = new Usuario();

    switch ($_POST['accion']) {
        case "CONSULTAR":
            echo json_encode($usr->listar_usuarios());
            break;

      case "NUEVO":
    $pass = strtolower($_POST['pass']);

    echo json_encode($usr->agregar_usuario(
        strtoupper($_POST['nombre']),
        strtolower($_POST['usuario']),
        md5($pass),
        intval($_POST['id_perfil']),
        strtoupper($_POST['estado'])
    ));
    break;


        case "CONSULTAR_ID":
            echo json_encode($usr->consultarPorId($_POST['idUsuario']));
            break;

        case "MODIFICAR":
    $pass = strtolower($_POST['pass']);

    echo json_encode($usr->editar_usuario(
        intval($_POST['idUsuario']),
        strtoupper($_POST['nombre']),
        strtolower($_POST['usuario']),
        md5($pass),
        intval($_POST['id_perfil']),
        strtoupper($_POST['estado'])
    ));
    break;

        case "ELIMINAR":
            echo json_encode($usr->eliminar_usuario(intval($_POST['idUsuario']), strtoupper($_POST['estado'])));
            break;
    }
}
=======
<?php
require_once '../modelos/usuarioModelo.php';

if ($_POST) {
    $usr = new Usuario();

    switch ($_POST['accion']) {
        case "CONSULTAR":
            echo json_encode($usr->listar_usuarios());
            break;

      case "NUEVO":
    $pass = strtolower($_POST['pass']);

    echo json_encode($usr->agregar_usuario(
        strtoupper($_POST['nombre']),
        strtolower($_POST['usuario']),
        md5($pass),
        intval($_POST['id_perfil']),
        strtoupper($_POST['estado'])
    ));
    break;


        case "CONSULTAR_ID":
            echo json_encode($usr->consultarPorId($_POST['idUsuario']));
            break;

        case "MODIFICAR":
    $pass = strtolower($_POST['pass']);

    echo json_encode($usr->editar_usuario(
        intval($_POST['idUsuario']),
        strtoupper($_POST['nombre']),
        strtolower($_POST['usuario']),
        md5($pass),
        intval($_POST['id_perfil']),
        strtoupper($_POST['estado'])
    ));
    break;

        case "ELIMINAR":
            echo json_encode($usr->eliminar_usuario(intval($_POST['idUsuario']), strtoupper($_POST['estado'])));
            break;
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>