<<<<<<< HEAD
<?php
require "conexion.php";

class ERfactura {

    public function consultarPorPeriodoEstado($mes, $anio, $estado) {
        $conex = new Conexion();

        $sql = "SELECT 
                    f.id_factura,
                    le.nom_lector,
                    l.titulo,
                    p.fechaPrestamo,
                    p.fechaDevolucion,
                    f.fecha AS fechaFactura,
                    f.subtotal,
                    f.igv,
                    f.total,
                    CASE 
                        WHEN p.fechaDevolucion < CURDATE() THEN 'VENCIDO'
                        ELSE 'VIGENTE'
                    END AS estado_dinamico
                FROM factura f
                INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
                INNER JOIN libro l ON p.id_libro = l.id_libro
                INNER JOIN lectores le ON p.id_lector = le.id_lector
                WHERE MONTH(f.fecha) = ? 
                  AND YEAR(f.fecha) = ?";

        if ($estado != "TODOS") {
            $sql .= " HAVING estado_dinamico = ?";
        }

        $stmt = $conex->prepare($sql);
        $stmt->bindParam(1, $mes, PDO::PARAM_INT);
        $stmt->bindParam(2, $anio, PDO::PARAM_INT);

        if ($estado != "TODOS") {
            $stmt->bindParam(3, $estado, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
=======
<?php
require "conexion.php";

class ERfactura {

    public function consultarPorPeriodoEstado($mes, $anio, $estado) {
        $conex = new Conexion();

        $sql = "SELECT 
                    f.id_factura,
                    le.nom_lector,
                    l.titulo,
                    p.fechaPrestamo,
                    p.fechaDevolucion,
                    f.fecha AS fechaFactura,
                    f.subtotal,
                    f.igv,
                    f.total,
                    CASE 
                        WHEN p.fechaDevolucion < CURDATE() THEN 'VENCIDO'
                        ELSE 'VIGENTE'
                    END AS estado_dinamico
                FROM factura f
                INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
                INNER JOIN libro l ON p.id_libro = l.id_libro
                INNER JOIN lectores le ON p.id_lector = le.id_lector
                WHERE MONTH(f.fecha) = ? 
                  AND YEAR(f.fecha) = ?";

        if ($estado != "TODOS") {
            $sql .= " HAVING estado_dinamico = ?";
        }

        $stmt = $conex->prepare($sql);
        $stmt->bindParam(1, $mes, PDO::PARAM_INT);
        $stmt->bindParam(2, $anio, PDO::PARAM_INT);

        if ($estado != "TODOS") {
            $stmt->bindParam(3, $estado, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>