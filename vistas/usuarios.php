<<<<<<< HEAD
<?php
session_start();
if (isset($_SESSION['perfil']) && isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <h5 class="card-header header-gold">
          <i class="mdi mdi-account-multiple-outline me-2"></i> Mantenimiento de Usuarios
        </h5>

        <div class="card-body">

          <button class="btn btn-nuevo mb-3" data-bs-toggle="modal" data-bs-target="#AgregarUsuario">
            <i class="mdi mdi-plus-circle-outline mdi-24px"></i> Nuevo Usuario
          </button>

          <?php require_once 'ModalUsuario.php'; ?>

          <table id="dtUsuario" class="table table-bordered table-hover table-alejandria-gold text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>USUARIO</th>
                <th>PERFIL</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody id="datos"></tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/usuarios.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>alert(\"Debe iniciar sesión para acceder al sistema\");window.location=\"../index.php\";</script>';
}
=======
<?php
session_start();
if (isset($_SESSION['perfil']) && isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <h5 class="card-header header-gold">
          <i class="mdi mdi-account-multiple-outline me-2"></i> Mantenimiento de Usuarios
        </h5>

        <div class="card-body">

          <button class="btn btn-nuevo mb-3" data-bs-toggle="modal" data-bs-target="#AgregarUsuario">
            <i class="mdi mdi-plus-circle-outline mdi-24px"></i> Nuevo Usuario
          </button>

          <?php require_once 'ModalUsuario.php'; ?>

          <table id="dtUsuario" class="table table-bordered table-hover table-alejandria-gold text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>USUARIO</th>
                <th>PERFIL</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody id="datos"></tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/usuarios.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>alert(\"Debe iniciar sesión para acceder al sistema\");window.location=\"../index.php\";</script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>