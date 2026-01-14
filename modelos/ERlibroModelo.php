<<<<<<< HEAD
<?php  
require 'conexion.php';  
  
class ERLibros {  

    public function listarCategorias(){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("SELECT * FROM categoria");  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }  
  
    public function categoriaById($id){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("SELECT * FROM categoria WHERE idcategoria=?");  
        $stmt->bindParam(1,$id);  
        $stmt->execute();  
        return $stmt->fetch(PDO::FETCH_OBJ);  
    }  
  
    public function librosPorCategoria($id){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("
            SELECT id_libro, titulo, autor, anio, stock_total, stock_disponible, portada  
            FROM libro  
            WHERE id_categoria = ?  
        ");  
        $stmt->bindParam(1,$id);  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }  



 
    public function listarAutores(){  
    $cn = new Conexion();  
    $stmt = $cn->prepare("
        SELECT ROW_NUMBER() OVER (ORDER BY autor ASC) AS id, autor
        FROM (SELECT DISTINCT autor FROM libro) AS t
    ");  
    $stmt->execute();  
    return $stmt->fetchAll(PDO::FETCH_OBJ);  
}

    public function librosPorAutor($autor){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("
            SELECT id_libro, titulo, autor, anio, stock_total, stock_disponible, portada  
            FROM libro  
            WHERE autor = ?
        ");  
        $stmt->bindParam(1,$autor);  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }  
}  
=======
<?php  
require 'conexion.php';  
  
class ERLibros {  

    public function listarCategorias(){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("SELECT * FROM categoria");  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }  
  
    public function categoriaById($id){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("SELECT * FROM categoria WHERE idcategoria=?");  
        $stmt->bindParam(1,$id);  
        $stmt->execute();  
        return $stmt->fetch(PDO::FETCH_OBJ);  
    }  
  
    public function librosPorCategoria($id){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("
            SELECT id_libro, titulo, autor, anio, stock_total, stock_disponible, portada  
            FROM libro  
            WHERE id_categoria = ?  
        ");  
        $stmt->bindParam(1,$id);  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }  



 
    public function listarAutores(){  
    $cn = new Conexion();  
    $stmt = $cn->prepare("
        SELECT ROW_NUMBER() OVER (ORDER BY autor ASC) AS id, autor
        FROM (SELECT DISTINCT autor FROM libro) AS t
    ");  
    $stmt->execute();  
    return $stmt->fetchAll(PDO::FETCH_OBJ);  
}

    public function librosPorAutor($autor){  
        $cn = new Conexion();  
        $stmt = $cn->prepare("
            SELECT id_libro, titulo, autor, anio, stock_total, stock_disponible, portada  
            FROM libro  
            WHERE autor = ?
        ");  
        $stmt->bindParam(1,$autor);  
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_OBJ);  
    }  
}  
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>