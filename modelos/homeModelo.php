<<<<<<< HEAD
<?php
require_once 'conexion.php';

class HomeModelo {

 
    public function ultimosPrestamos() {
        $cn = new Conexion();
        $sql = "
            SELECT p.idprestamo, p.fechaPrestamo, p.fechaDevolucion, 
                   p.cantidad, p.condicion,
                   l.titulo, l.portada,
                   lec.nom_lector
            FROM prestamo p
            INNER JOIN libro l ON p.id_libro = l.id_libro
            INNER JOIN lectores lec ON p.id_lector = lec.id_lector
            ORDER BY p.idprestamo DESC
            LIMIT 10
        ";
        $stmt = $cn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function prestamosPorMes($anio) {
        $cn = new Conexion();
        $sql = "
            SELECT MONTH(fechaPrestamo) AS mes, COUNT(*) AS total
            FROM prestamo
            WHERE YEAR(fechaPrestamo) = ?
            GROUP BY MONTH(fechaPrestamo)
            ORDER BY mes ASC
        ";
        $stmt = $cn->prepare($sql);
        $stmt->bindParam(1, $anio);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
=======
<?php
require_once 'conexion.php';

class HomeModelo {

 
    public function ultimosPrestamos() {
        $cn = new Conexion();
        $sql = "
            SELECT p.idprestamo, p.fechaPrestamo, p.fechaDevolucion, 
                   p.cantidad, p.condicion,
                   l.titulo, l.portada,
                   lec.nom_lector
            FROM prestamo p
            INNER JOIN libro l ON p.id_libro = l.id_libro
            INNER JOIN lectores lec ON p.id_lector = lec.id_lector
            ORDER BY p.idprestamo DESC
            LIMIT 10
        ";
        $stmt = $cn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function prestamosPorMes($anio) {
        $cn = new Conexion();
        $sql = "
            SELECT MONTH(fechaPrestamo) AS mes, COUNT(*) AS total
            FROM prestamo
            WHERE YEAR(fechaPrestamo) = ?
            GROUP BY MONTH(fechaPrestamo)
            ORDER BY mes ASC
        ";
        $stmt = $cn->prepare($sql);
        $stmt->bindParam(1, $anio);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>