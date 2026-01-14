<<<<<<< HEAD
<?php
require_once 'conexion.php';

class Categoria {
    public function listar() {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_listarCategoria()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $descripcion) {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_insertarCategoria(:nombre, :descripcion)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
    }

    public function editar($id, $nombre, $descripcion) {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_actualizarCategoria(:id, :nombre, :descripcion)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
    }

    public function eliminar($id) {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_eliminarCategoria(:id)");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
=======
<?php
require_once 'conexion.php';

class Categoria {
    public function listar() {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_listarCategoria()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $descripcion) {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_insertarCategoria(:nombre, :descripcion)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
    }

    public function editar($id, $nombre, $descripcion) {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_actualizarCategoria(:id, :nombre, :descripcion)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
    }

    public function eliminar($id) {
        $con = new Conexion();
        $stmt = $con->prepare("CALL sp_eliminarCategoria(:id)");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>