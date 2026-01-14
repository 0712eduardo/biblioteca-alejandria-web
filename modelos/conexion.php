<<<<<<< HEAD
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Conexion extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct("mysql:host=localhost;dbname=biblioteca", "root", "");
            parent::exec("set names utf8");
        } catch (PDOException $e) {
            echo "Error al Conectar: " . $e->getMessage();
        }
    }
}
=======
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Conexion extends PDO
{
    public function __construct()
    {
        try {
            parent::__construct("mysql:host=localhost;dbname=biblioteca", "root", "");
            parent::exec("set names utf8");
        } catch (PDOException $e) {
            echo "Error al Conectar: " . $e->getMessage();
        }
    }
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>