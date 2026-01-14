<<<<<<< HEAD
<?php
require 'conexion.php';

class Prestamos
{
    public function listar_prestamos()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_prestamos()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function agregar_prestamo($id_libro, $id_lector, $fechaPrestamo, $fechaDevolucion, $cantidad, $condicion)
    {
        try {
            $conex = new Conexion();

            $stmt = $conex->prepare("CALL agregar_prestamo(?,?,?,?,?,?)");
            $stmt->bindParam(1, $id_libro);
            $stmt->bindParam(2, $id_lector);
            $stmt->bindParam(3, $fechaPrestamo);
            $stmt->bindParam(4, $fechaDevolucion);
            $stmt->bindParam(5, $cantidad);
            $stmt->bindParam(6, $condicion);
            $stmt->execute();

            return ["estado" => "OK"];

        } catch (PDOException $e) {

            $msg = $e->getMessage();

            $msg = preg_replace('/SQLSTATE\[[0-9A-Z]+\]:.*?: /', '', $msg); 
            $msg = preg_replace('/^[0-9]{4}\s*/', '', $msg); 
            $msg = trim($msg);

            return [
                "estado" => "ERROR",
                "mensaje" => $msg
            ];
        }
    }

    public function consultarPorId($id)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM prestamo WHERE idprestamo = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function modificar_prestamo($id, $id_libro, $id_lector, $fechaPrestamo, $fechaDevolucion, $cantidad, $condicion)
    {
        try {
            $conex = new Conexion();

            $oldStmt = $conex->prepare("SELECT id_libro, cantidad FROM prestamo WHERE idprestamo = ?");
            $oldStmt->bindParam(1, $id);
            $oldStmt->execute();
            $old = $oldStmt->fetch(PDO::FETCH_OBJ);

            if (!$old) {
                return ["estado" => "ERROR", "mensaje" => "Préstamo no encontrado"];
            }

            $stmt = $conex->prepare("CALL editar_prestamo(?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $id_libro);
            $stmt->bindParam(3, $id_lector);
            $stmt->bindParam(4, $fechaPrestamo);
            $stmt->bindParam(5, $fechaDevolucion);
            $stmt->bindParam(6, $cantidad);
            $stmt->bindParam(7, $condicion);

            $stmt->execute();

            return ["estado" => "OK"];

        } catch (PDOException $e) {

            $msg = $e->getMessage();

            $msg = preg_replace('/SQLSTATE\[[0-9A-Z]+\]:.*?: /', '', $msg);
            $msg = preg_replace('/^[0-9]{4}\s*/', '', $msg);
            $msg = trim($msg);

            return [
                "estado" => "ERROR",
                "mensaje" => $msg
            ];
        }
    }

    public function eliminar_prestamo($id, $condicion)
    {
        try {
            $conex = new Conexion();
            $stmt = $conex->prepare("CALL eliminar_prestamo(?,?)");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $condicion);
            $stmt->execute();

            return ["estado" => "OK"];

        } catch (PDOException $e) {

            $msg = $e->getMessage();

            $msg = preg_replace('/SQLSTATE\[[0-9A-Z]+\]:.*?: /', '', $msg);
            $msg = preg_replace('/^[0-9]{4}\s*/', '', $msg);
            $msg = trim($msg);

            return [
                "estado" => "ERROR",
                "mensaje" => $msg
            ];
        }
    }
}
=======
<?php
require 'conexion.php';

class Prestamos
{
    public function listar_prestamos()
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("CALL listar_prestamos()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function agregar_prestamo($id_libro, $id_lector, $fechaPrestamo, $fechaDevolucion, $cantidad, $condicion)
    {
        try {
            $conex = new Conexion();

            $stmt = $conex->prepare("CALL agregar_prestamo(?,?,?,?,?,?)");
            $stmt->bindParam(1, $id_libro);
            $stmt->bindParam(2, $id_lector);
            $stmt->bindParam(3, $fechaPrestamo);
            $stmt->bindParam(4, $fechaDevolucion);
            $stmt->bindParam(5, $cantidad);
            $stmt->bindParam(6, $condicion);
            $stmt->execute();

            return ["estado" => "OK"];

        } catch (PDOException $e) {

            $msg = $e->getMessage();

            $msg = preg_replace('/SQLSTATE\[[0-9A-Z]+\]:.*?: /', '', $msg); 
            $msg = preg_replace('/^[0-9]{4}\s*/', '', $msg); 
            $msg = trim($msg);

            return [
                "estado" => "ERROR",
                "mensaje" => $msg
            ];
        }
    }

    public function consultarPorId($id)
    {
        $conex = new Conexion();
        $stmt = $conex->prepare("SELECT * FROM prestamo WHERE idprestamo = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function modificar_prestamo($id, $id_libro, $id_lector, $fechaPrestamo, $fechaDevolucion, $cantidad, $condicion)
    {
        try {
            $conex = new Conexion();

            $oldStmt = $conex->prepare("SELECT id_libro, cantidad FROM prestamo WHERE idprestamo = ?");
            $oldStmt->bindParam(1, $id);
            $oldStmt->execute();
            $old = $oldStmt->fetch(PDO::FETCH_OBJ);

            if (!$old) {
                return ["estado" => "ERROR", "mensaje" => "Préstamo no encontrado"];
            }

            $stmt = $conex->prepare("CALL editar_prestamo(?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $id_libro);
            $stmt->bindParam(3, $id_lector);
            $stmt->bindParam(4, $fechaPrestamo);
            $stmt->bindParam(5, $fechaDevolucion);
            $stmt->bindParam(6, $cantidad);
            $stmt->bindParam(7, $condicion);

            $stmt->execute();

            return ["estado" => "OK"];

        } catch (PDOException $e) {

            $msg = $e->getMessage();

            $msg = preg_replace('/SQLSTATE\[[0-9A-Z]+\]:.*?: /', '', $msg);
            $msg = preg_replace('/^[0-9]{4}\s*/', '', $msg);
            $msg = trim($msg);

            return [
                "estado" => "ERROR",
                "mensaje" => $msg
            ];
        }
    }

    public function eliminar_prestamo($id, $condicion)
    {
        try {
            $conex = new Conexion();
            $stmt = $conex->prepare("CALL eliminar_prestamo(?,?)");
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $condicion);
            $stmt->execute();

            return ["estado" => "OK"];

        } catch (PDOException $e) {

            $msg = $e->getMessage();

            $msg = preg_replace('/SQLSTATE\[[0-9A-Z]+\]:.*?: /', '', $msg);
            $msg = preg_replace('/^[0-9]{4}\s*/', '', $msg);
            $msg = trim($msg);

            return [
                "estado" => "ERROR",
                "mensaje" => $msg
            ];
        }
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>