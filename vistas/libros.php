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
                    <i class="mdi mdi-book-open-page-variant"></i> Mantenimiento de Libros
                </h5>

                <div class="card-body">

                    <button type="button" class="btn btn-nuevo mb-3" data-bs-toggle="modal" data-bs-target="#AgregarLibro">
                        <i class="mdi mdi-plus-circle mdi-24px"></i> Nuevo
                    </button>

                    <?php require_once 'ModalLibro.php'; ?>

                    <table id="dtLibro" class="table table-alejandria-gold text-center align-middle">
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>PORTADA</th>
                                <th>TÍTULO</th>
                                <th>AUTOR</th>
                                <th>CATEGORÍA</th>
                                <th>AÑO</th>
                                <th>STOCK TOTAL</th>
                                <th>STOCK DISPONIBLE</th>
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
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/libros.js'></script>";
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
                    <i class="mdi mdi-book-open-page-variant"></i> Mantenimiento de Libros
                </h5>

                <div class="card-body">

                    <button type="button" class="btn btn-nuevo mb-3" data-bs-toggle="modal" data-bs-target="#AgregarLibro">
                        <i class="mdi mdi-plus-circle mdi-24px"></i> Nuevo
                    </button>

                    <?php require_once 'ModalLibro.php'; ?>

                    <table id="dtLibro" class="table table-alejandria-gold text-center align-middle">
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>PORTADA</th>
                                <th>TÍTULO</th>
                                <th>AUTOR</th>
                                <th>CATEGORÍA</th>
                                <th>AÑO</th>
                                <th>STOCK TOTAL</th>
                                <th>STOCK DISPONIBLE</th>
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
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/salir.js'></script>";
    echo "<script src='../js/libros.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>alert(\"Debe iniciar sesión para acceder al sistema\");window.location=\"../index.php\";</script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>