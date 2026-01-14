<<<<<<< HEAD
<?php
require 'conexion.php';

class Libros
{
    public function listar_libros()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_libros()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function agregar_libro($titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL agregar_libro(?,?,?,?,?,?,?,?)");
        return ($stmt->execute([$titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion])) 
               ? "OK" : "Error";
    }

    public function consultarPorId($id)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM libro WHERE id_libro = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function modificar_libro($id, $titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL editar_libro(?,?,?,?,?,?,?,?,?)");
        return ($stmt->execute([$id, $titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion]))
               ? "OK" : "Error";
    }

    public function eliminar_libro($id, $condicion)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL eliminar_libro(?,?)");
        return ($stmt->execute([$id, $condicion])) ? "OK" : "Error";
    }
}
=======
<?php
require 'conexion.php';

class Libros
{
    public function listar_libros()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_libros()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function agregar_libro($titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL agregar_libro(?,?,?,?,?,?,?,?)");
        return ($stmt->execute([$titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion])) 
               ? "OK" : "Error";
    }

    public function consultarPorId($id)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM libro WHERE id_libro = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function modificar_libro($id, $titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL editar_libro(?,?,?,?,?,?,?,?,?)");
        return ($stmt->execute([$id, $titulo, $autor, $portada, $anio, $id_categoria, $stock_total, $stock_disponible, $condicion]))
               ? "OK" : "Error";
    }

    public function eliminar_libro($id, $condicion)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL eliminar_libro(?,?)");
        return ($stmt->execute([$id, $condicion])) ? "OK" : "Error";
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>