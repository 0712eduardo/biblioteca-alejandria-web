<<<<<<< HEAD
<?php  
require 'conexion.php';  

class Login  
{  
    public function InicioSesion($usu, $con)  
    {  
        $conex = new Conexion();  

        $stmt = $conex->prepare("SELECT usuario.*, perfil.nombre_perfil  
                                 FROM usuario  
                                 INNER JOIN perfil ON usuario.id_perfil = perfil.id_perfil  
                                 WHERE usuario.usuario = :usu");  
        $stmt->bindValue(":usu", $usu, PDO::PARAM_STR);  
        $stmt->execute();  
        $obj_usuario = $stmt->fetch(PDO::FETCH_OBJ);  

        if (!$obj_usuario) {  
            return array("resultado" => "ERROR", "mensaje" => "Usuario incorrecto");  
        } else {  
            if ($obj_usuario->estado === 'I') {  
                return array("resultado" => "INACTIVO", "mensaje" => "El usuario está inactivo. Comuníquese con el administrador.");  
            }  

           if (md5($con) !== $obj_usuario->pass &&
    md5(strtolower($con)) !== $obj_usuario->pass) {

    return array("resultado" => "ERROR", "mensaje" => "La contraseña ingresada no es correcta");
}

            if (session_status() === PHP_SESSION_NONE) {  
                session_start();  
            }  

            $_SESSION['perfil'] = $obj_usuario->id_perfil;  
            $_SESSION['usuario'] = $obj_usuario->nombre;  
            $_SESSION['nom_perfil'] = $obj_usuario->nombre_perfil;  

            return array("resultado" => "OK", "nombre" => $obj_usuario->nombre);  
        }  
    }  
}  
=======
<?php  
require 'conexion.php';  

class Login  
{  
    public function InicioSesion($usu, $con)  
    {  
        $conex = new Conexion();  

        $stmt = $conex->prepare("SELECT usuario.*, perfil.nombre_perfil  
                                 FROM usuario  
                                 INNER JOIN perfil ON usuario.id_perfil = perfil.id_perfil  
                                 WHERE usuario.usuario = :usu");  
        $stmt->bindValue(":usu", $usu, PDO::PARAM_STR);  
        $stmt->execute();  
        $obj_usuario = $stmt->fetch(PDO::FETCH_OBJ);  

        if (!$obj_usuario) {  
            return array("resultado" => "ERROR", "mensaje" => "Usuario incorrecto");  
        } else {  
            if ($obj_usuario->estado === 'I') {  
                return array("resultado" => "INACTIVO", "mensaje" => "El usuario está inactivo. Comuníquese con el administrador.");  
            }  

           if (md5($con) !== $obj_usuario->pass &&
    md5(strtolower($con)) !== $obj_usuario->pass) {

    return array("resultado" => "ERROR", "mensaje" => "La contraseña ingresada no es correcta");
}

            if (session_status() === PHP_SESSION_NONE) {  
                session_start();  
            }  

            $_SESSION['perfil'] = $obj_usuario->id_perfil;  
            $_SESSION['usuario'] = $obj_usuario->nombre;  
            $_SESSION['nom_perfil'] = $obj_usuario->nombre_perfil;  

            return array("resultado" => "OK", "nombre" => $obj_usuario->nombre);  
        }  
    }  
}  
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>