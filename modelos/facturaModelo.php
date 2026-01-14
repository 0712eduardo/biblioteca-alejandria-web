<<<<<<< HEAD
<?php
require 'conexion.php';

class Facturas {
  public function listar_facturas() {
    $conex = new Conexion();
    $stmt = $conex->prepare("
      SELECT 
        f.id_factura,
        l.nom_lector,
        b.titulo,
        f.fecha,
        p.fechaDevolucion,
        f.tipo,
        f.subtotal,
        f.igv,
        f.total
      FROM factura f
      INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
      INNER JOIN lectores l ON p.id_lector = l.id_lector
      INNER JOIN libro b ON p.id_libro = b.id_libro
      ORDER BY f.id_factura DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function actualizar_factura($id, $subtotal, $igv, $total) {
    try {
      $conex = new Conexion();
      $stmt = $conex->prepare("UPDATE factura SET subtotal=?, igv=?, total=? WHERE id_factura=?");
      $stmt->bindParam(1, $subtotal);
      $stmt->bindParam(2, $igv);
      $stmt->bindParam(3, $total);
      $stmt->bindParam(4, $id);
      return $stmt->execute() ? "OK" : "Error al actualizar la factura";
    } catch (PDOException $e) {
      return "Error: " . $e->getMessage();
    }
  }
}
=======
<?php
require 'conexion.php';

class Facturas {
  public function listar_facturas() {
    $conex = new Conexion();
    $stmt = $conex->prepare("
      SELECT 
        f.id_factura,
        l.nom_lector,
        b.titulo,
        f.fecha,
        p.fechaDevolucion,
        f.tipo,
        f.subtotal,
        f.igv,
        f.total
      FROM factura f
      INNER JOIN prestamo p ON f.id_prestamo = p.idprestamo
      INNER JOIN lectores l ON p.id_lector = l.id_lector
      INNER JOIN libro b ON p.id_libro = b.id_libro
      ORDER BY f.id_factura DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function actualizar_factura($id, $subtotal, $igv, $total) {
    try {
      $conex = new Conexion();
      $stmt = $conex->prepare("UPDATE factura SET subtotal=?, igv=?, total=? WHERE id_factura=?");
      $stmt->bindParam(1, $subtotal);
      $stmt->bindParam(2, $igv);
      $stmt->bindParam(3, $total);
      $stmt->bindParam(4, $id);
      return $stmt->execute() ? "OK" : "Error al actualizar la factura";
    } catch (PDOException $e) {
      return "Error: " . $e->getMessage();
    }
  }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>