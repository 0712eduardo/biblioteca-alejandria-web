<<<<<<< HEAD
<?php
session_start();
if (isset($_SESSION['perfil']) && isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
    <div class="card">
        
        <!-- HEADER GOLD -->
        <div class="card-header header-gold d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="ri-bookmark-line"></i> Mantenimiento de Categorías</h5>

            <button type="button" class="btn-nuevo btn btn-sm" data-bs-toggle="modal" data-bs-target="#AgregarCategoria">
                <i class="mdi mdi-plus-circle mdi-18px"></i> Nuevo
            </button>
        </div>

        <div class="card-body">
            <?php require_once 'ModalCategoria.php'; ?>

            <table id="dtCategoria" class="table table-bordered table-hover table-alejandria-gold text-center align-middle">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCIÓN</th>
                        <th>CONDICIÓN</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="datos"></tbody>
            </table>
        </div>
    </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/categorias.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>alert("Debe iniciar sesión para acceder al sistema"); window.location="../index.php";</script>';
}
=======
<?php
session_start();
if (isset($_SESSION['perfil']) && isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
    <div class="card">
        
        <!-- HEADER GOLD -->
        <div class="card-header header-gold d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="ri-bookmark-line"></i> Mantenimiento de Categorías</h5>

            <button type="button" class="btn-nuevo btn btn-sm" data-bs-toggle="modal" data-bs-target="#AgregarCategoria">
                <i class="mdi mdi-plus-circle mdi-18px"></i> Nuevo
            </button>
        </div>

        <div class="card-body">
            <?php require_once 'ModalCategoria.php'; ?>

            <table id="dtCategoria" class="table table-bordered table-hover table-alejandria-gold text-center align-middle">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCIÓN</th>
                        <th>CONDICIÓN</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="datos"></tbody>
            </table>
        </div>
    </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/categorias.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>alert("Debe iniciar sesión para acceder al sistema"); window.location="../index.php";</script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>