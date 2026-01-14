<<<<<<< HEAD
<?php  
require_once '../modelos/accesoModelo.php';  
if($_POST)  
{  
    $usuario = ($_POST['usuario']);  
    $contrasena = ($_POST['contrasena']);  
    $acceso = new Login();  
    $resultado = $acceso->InicioSesion($usuario, $contrasena);  
    echo json_encode($resultado);  
}  
=======
<?php  
require_once '../modelos/accesoModelo.php';  
if($_POST)  
{  
    $usuario = ($_POST['usuario']);  
    $contrasena = ($_POST['contrasena']);  
    $acceso = new Login();  
    $resultado = $acceso->InicioSesion($usuario, $contrasena);  
    echo json_encode($resultado);  
}  
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>