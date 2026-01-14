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
          <i class="ri-shield-user-line"></i> Mantenimiento de Perfiles
        </h5>

        <div class="card-body">

          <button type="button" class="btn-nuevo mb-3" data-bs-toggle="modal" data-bs-target="#AgregarPerfil">
            <i class="mdi mdi-plus-circle mdi-24px"></i> Nuevo
          </button>

          <?php require_once 'ModalPerfil.php'; ?>

          <table id="dtPerfil" class="table table-alejandria-gold align-middle text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre del Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
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
    echo "<script src='../js/perfil.js'></script>";  
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
          <i class="ri-shield-user-line"></i> Mantenimiento de Perfiles
        </h5>

        <div class="card-body">

          <button type="button" class="btn-nuevo mb-3" data-bs-toggle="modal" data-bs-target="#AgregarPerfil">
            <i class="mdi mdi-plus-circle mdi-24px"></i> Nuevo
          </button>

          <?php require_once 'ModalPerfil.php'; ?>

          <table id="dtPerfil" class="table table-alejandria-gold align-middle text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre del Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
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
    echo "<script src='../js/perfil.js'></script>";  
    echo "<script src='../js/mensaje.js'></script>";  
    echo "<script src='../js/datatable.js'></script>";  
} else {  
    echo '<script>alert(\"Debe iniciar sesión para acceder al sistema\");window.location=\"../index.php\";</script>';  
}  
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>