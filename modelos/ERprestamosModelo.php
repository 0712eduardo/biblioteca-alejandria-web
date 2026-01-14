<<<<<<< HEAD
<?php
require "conexion.php";

class ERprestamos {

    public function consultarPorMesAnio($mes, $anio) {
        $conex = new Conexion();

        $sql = "SELECT 
                    p.idprestamo,
                    l.titulo,
                    le.nom_lector,
                    p.fechaPrestamo,
                    p.fechaDevolucion,
                    p.cantidad,
                    p.condicion
                FROM prestamo p
                INNER JOIN libro l ON p.id_libro = l.id_libro
                INNER JOIN lectores le ON p.id_lector = le.id_lector
                WHERE MONTH(p.fechaPrestamo) = ? 
                  AND YEAR(p.fechaPrestamo) = ?
                ORDER BY p.fechaPrestamo ASC";

        $stmt = $conex->prepare($sql);
        $stmt->bindParam(1, $mes, PDO::PARAM_INT);
        $stmt->bindParam(2, $anio, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
=======
<?php
require "conexion.php";

class ERprestamos {

    public function consultarPorMesAnio($mes, $anio) {
        $conex = new Conexion();

        $sql = "SELECT 
                    p.idprestamo,
                    l.titulo,
                    le.nom_lector,
                    p.fechaPrestamo,
                    p.fechaDevolucion,
                    p.cantidad,
                    p.condicion
                FROM prestamo p
                INNER JOIN libro l ON p.id_libro = l.id_libro
                INNER JOIN lectores le ON p.id_lector = le.id_lector
                WHERE MONTH(p.fechaPrestamo) = ? 
                  AND YEAR(p.fechaPrestamo) = ?
                ORDER BY p.fechaPrestamo ASC";

        $stmt = $conex->prepare($sql);
        $stmt->bindParam(1, $mes, PDO::PARAM_INT);
        $stmt->bindParam(2, $anio, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>