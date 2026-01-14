<<<<<<< HEAD
<?php
require_once '../modelos/facturaModelo.php';

if ($_POST) {
  $fac = new Facturas();

  switch ($_POST['accion']) {
    case "CONSULTAR":
      echo json_encode($fac->listar_facturas());
      break;

    case "ACTUALIZAR":
      echo json_encode($fac->actualizar_factura(
        intval($_POST['id_factura']),
        floatval($_POST['subtotal']),
        floatval($_POST['igv']),
        floatval($_POST['total'])
      ));
      break;
  }
}
=======
<?php
require_once '../modelos/facturaModelo.php';

if ($_POST) {
  $fac = new Facturas();

  switch ($_POST['accion']) {
    case "CONSULTAR":
      echo json_encode($fac->listar_facturas());
      break;

    case "ACTUALIZAR":
      echo json_encode($fac->actualizar_factura(
        intval($_POST['id_factura']),
        floatval($_POST['subtotal']),
        floatval($_POST['igv']),
        floatval($_POST['total'])
      ));
      break;
  }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>