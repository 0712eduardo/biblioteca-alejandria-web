<<<<<<< HEAD
<?php
require 'conexion.php';

class Usuario {
    public function listar_usuarios() {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_usuarios()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function consultarPorId($id) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL consultar_usuario_por_id(?)");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar_usuario($nombre, $usuario, $pass, $id_perfil, $estado) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL agregar_usuario(?,?,?,?,?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $usuario);
        $stmt->bindParam(3, $pass);
        $stmt->bindParam(4, $id_perfil);
        $stmt->bindParam(5, $estado);
        return $stmt->execute() ? "OK" : "Error al registrar el usuario";
    }

    public function editar_usuario($id, $nombre, $usuario, $pass, $id_perfil, $estado) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL editar_usuario(?,?,?,?,?,?)");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $nombre);
        $stmt->bindParam(3, $usuario);
        $stmt->bindParam(4, $pass);
        $stmt->bindParam(5, $id_perfil);
        $stmt->bindParam(6, $estado);
        return $stmt->execute() ? "OK" : "Error al modificar el usuario";
    }

    public function eliminar_usuario($id, $estado) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL eliminar_usuario(?,?)");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $estado);
        return $stmt->execute() ? "OK" : "Error al eliminar el usuario";
    }
}
=======
<?php
require 'conexion.php';

class Usuario {
    public function listar_usuarios() {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_usuarios()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function consultarPorId($id) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL consultar_usuario_por_id(?)");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregar_usuario($nombre, $usuario, $pass, $id_perfil, $estado) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL agregar_usuario(?,?,?,?,?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $usuario);
        $stmt->bindParam(3, $pass);
        $stmt->bindParam(4, $id_perfil);
        $stmt->bindParam(5, $estado);
        return $stmt->execute() ? "OK" : "Error al registrar el usuario";
    }

    public function editar_usuario($id, $nombre, $usuario, $pass, $id_perfil, $estado) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL editar_usuario(?,?,?,?,?,?)");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $nombre);
        $stmt->bindParam(3, $usuario);
        $stmt->bindParam(4, $pass);
        $stmt->bindParam(5, $id_perfil);
        $stmt->bindParam(6, $estado);
        return $stmt->execute() ? "OK" : "Error al modificar el usuario";
    }

    public function eliminar_usuario($id, $estado) {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL eliminar_usuario(?,?)");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $estado);
        return $stmt->execute() ? "OK" : "Error al eliminar el usuario";
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>