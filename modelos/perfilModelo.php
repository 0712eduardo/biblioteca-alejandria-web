<<<<<<< HEAD
<?php
require 'conexion.php';

class Perfil
{
  public function listar_perfiles()
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL listar_perfiles()");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function agregar_perfil($nombre_perfil, $estado)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL agregar_perfil(?, ?)");
    $stmt->bindParam(1, $nombre_perfil);
    $stmt->bindParam(2, $estado);
    return $stmt->execute() ? "OK" : "Error al registrar el perfil";
  }

  public function consultarPorId($id)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("SELECT * FROM perfil WHERE id_perfil = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function modificar_perfil($id, $nombre_perfil, $estado)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL editar_perfil(?, ?, ?)");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $nombre_perfil);
    $stmt->bindParam(3, $estado);
    return $stmt->execute() ? "OK" : "Error al modificar el perfil";
  }

  public function eliminar_perfil($id)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL eliminar_perfil(?)");
    $stmt->bindParam(1, $id);
    return $stmt->execute() ? "OK" : "Error al eliminar el perfil";
  }
}
=======
<?php
require 'conexion.php';

class Perfil
{
  public function listar_perfiles()
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL listar_perfiles()");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function agregar_perfil($nombre_perfil, $estado)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL agregar_perfil(?, ?)");
    $stmt->bindParam(1, $nombre_perfil);
    $stmt->bindParam(2, $estado);
    return $stmt->execute() ? "OK" : "Error al registrar el perfil";
  }

  public function consultarPorId($id)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("SELECT * FROM perfil WHERE id_perfil = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  public function modificar_perfil($id, $nombre_perfil, $estado)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL editar_perfil(?, ?, ?)");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $nombre_perfil);
    $stmt->bindParam(3, $estado);
    return $stmt->execute() ? "OK" : "Error al modificar el perfil";
  }

  public function eliminar_perfil($id)
  {
    $conex = new Conexion();
    $stmt = $conex->prepare("CALL eliminar_perfil(?)");
    $stmt->bindParam(1, $id);
    return $stmt->execute() ? "OK" : "Error al eliminar el perfil";
  }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>