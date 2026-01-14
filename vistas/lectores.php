<<<<<<< HEAD
<?php
session_start();
if (isset($_SESSION['perfil']) && isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-4">
    <div class="card shadow-lg">

        <div class="card-header header-gold d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="ri-user-3-line"></i> Mantenimiento de Lectores
            </h5>

            <button type="button" class="btn btn-nuevo btn-sm fw-bold"
                    data-bs-toggle="modal" data-bs-target="#AgregarLector">
                <i class="mdi mdi-plus-circle mdi-18px" style="color:white !important;"></i>
                Nuevo
            </button>
        </div>

        <div class="card-body bg-light">

            <?php require_once 'ModalLector.php'; ?>

            <div class="table-responsive">
                <table id="dtLector" class="table table-bordered table-hover table-alejandria-gold align-middle text-center">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRES</th>
                            <th>DIRECCIÓN</th>
                            <th>TELÉFONO</th>
                            <th>CONDICIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="datos"></tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/lectores.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>
        alert("Debe iniciar sesión para acceder al sistema");
        window.location="../index.php";
    </script>';
}
=======
<?php
session_start();
if (isset($_SESSION['perfil']) && isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-4">
    <div class="card shadow-lg">

        <div class="card-header header-gold d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="ri-user-3-line"></i> Mantenimiento de Lectores
            </h5>

            <button type="button" class="btn btn-nuevo btn-sm fw-bold"
                    data-bs-toggle="modal" data-bs-target="#AgregarLector">
                <i class="mdi mdi-plus-circle mdi-18px" style="color:white !important;"></i>
                Nuevo
            </button>
        </div>

        <div class="card-body bg-light">

            <?php require_once 'ModalLector.php'; ?>

            <div class="table-responsive">
                <table id="dtLector" class="table table-bordered table-hover table-alejandria-gold align-middle text-center">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRES</th>
                            <th>DIRECCIÓN</th>
                            <th>TELÉFONO</th>
                            <th>CONDICIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="datos"></tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/lectores.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>
        alert("Debe iniciar sesión para acceder al sistema");
        window.location="../index.php";
    </script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>