<<<<<<< HEAD
<?php
require 'conexion.php';

class Lectores
{
    public function listar_lectores()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM lectores");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function agregar_lector($nom, $dir, $tel, $con)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare('CALL agregar_lector(?,?,?,?);');
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $dir);
        $stmt->bindParam(3, $tel);
        $stmt->bindParam(4, $con);
        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error al guardar lector";
        }
    }

    public function ConsultarPorId($id)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM lectores WHERE id_lector=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function Modifica_Lector($id, $n, $d, $t, $c)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare('CALL editar_lector(?,?,?,?,?);');
        $stmt->bindParam(1, $n);
        $stmt->bindParam(2, $d);
        $stmt->bindParam(3, $t);
        $stmt->bindParam(4, $id);
        $stmt->bindParam(5, $c);
        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error al modificar lector";
        }
    }

    public function Eliminar($id, $con)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare('CALL eliminar_lector(?,?);');
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $con);
        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error al eliminar lector";
        }
    }
}
?>
=======
<?php
require 'conexion.php';

class Lectores
{
    public function listar_lectores()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM lectores");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function agregar_lector($nom, $dir, $tel, $con)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare('CALL agregar_lector(?,?,?,?);');
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $dir);
        $stmt->bindParam(3, $tel);
        $stmt->bindParam(4, $con);
        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error al guardar lector";
        }
    }

    public function ConsultarPorId($id)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM lectores WHERE id_lector=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function Modifica_Lector($id, $n, $d, $t, $c)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare('CALL editar_lector(?,?,?,?,?);');
        $stmt->bindParam(1, $n);
        $stmt->bindParam(2, $d);
        $stmt->bindParam(3, $t);
        $stmt->bindParam(4, $id);
        $stmt->bindParam(5, $c);
        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error al modificar lector";
        }
    }

    public function Eliminar($id, $con)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare('CALL eliminar_lector(?,?);');
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $con);
        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error al eliminar lector";
        }
    }
}
?>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
