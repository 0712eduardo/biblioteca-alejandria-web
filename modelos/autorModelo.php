<<<<<<< HEAD
<?php
require 'conexion.php';

class Autor
{
    public function listar_autores()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_autores_libros()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function libros_por_autor($autor)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_libros_por_autor(?)");
        $stmt->bindParam(1, $autor);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
=======
<?php
require 'conexion.php';

class Autor
{
    public function listar_autores()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_autores_libros()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function libros_por_autor($autor)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_libros_por_autor(?)");
        $stmt->bindParam(1, $autor);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>