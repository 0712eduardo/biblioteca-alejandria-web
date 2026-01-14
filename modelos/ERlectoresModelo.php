<<<<<<< HEAD
<?php
require "conexion.php";

class ERlectores {

    public function consultar($condicion) {
        $conex = new Conexion();

        $sql = "SELECT * FROM lectores WHERE condicion = ?";
        $stmt = $conex->prepare($sql);
        $stmt->bindParam(1, $condicion);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
=======
<?php
require "conexion.php";

class ERlectores {

    public function consultar($condicion) {
        $conex = new Conexion();

        $sql = "SELECT * FROM lectores WHERE condicion = ?";
        $stmt = $conex->prepare($sql);
        $stmt->bindParam(1, $condicion);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>