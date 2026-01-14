<<<<<<< HEAD
<?php
require_once '../modelos/perfilModelo.php';

if ($_POST) {
  $perfil = new Perfil();

  switch ($_POST['accion']) {

    case "CONSULTAR":
      echo json_encode($perfil->listar_perfiles());
      break;

    case "NUEVO":
      echo json_encode($perfil->agregar_perfil(
        strtoupper($_POST['nombre_perfil']),
        $_POST['estado']
      ));
      break;

    case "CONSULTAR_ID":
      echo json_encode($perfil->consultarPorId($_POST['idPerfil']));
      break;

    case "MODIFICAR":
      echo json_encode($perfil->modificar_perfil(
        $_POST['idPerfil'],
        strtoupper($_POST['nombre_perfil']),
        $_POST['estado']
      ));
      break;

    case "ELIMINAR":
      echo json_encode($perfil->eliminar_perfil($_POST['idPerfil']));
      break;
  }
}
=======
<?php
require_once '../modelos/perfilModelo.php';

if ($_POST) {
  $perfil = new Perfil();

  switch ($_POST['accion']) {

    case "CONSULTAR":
      echo json_encode($perfil->listar_perfiles());
      break;

    case "NUEVO":
      echo json_encode($perfil->agregar_perfil(
        strtoupper($_POST['nombre_perfil']),
        $_POST['estado']
      ));
      break;

    case "CONSULTAR_ID":
      echo json_encode($perfil->consultarPorId($_POST['idPerfil']));
      break;

    case "MODIFICAR":
      echo json_encode($perfil->modificar_perfil(
        $_POST['idPerfil'],
        strtoupper($_POST['nombre_perfil']),
        $_POST['estado']
      ));
      break;

    case "ELIMINAR":
      echo json_encode($perfil->eliminar_perfil($_POST['idPerfil']));
      break;
  }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>