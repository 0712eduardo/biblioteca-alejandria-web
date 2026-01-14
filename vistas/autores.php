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
                    <i class="mdi mdi-account-tie me-2 text-white"></i>
                    Autores y sus Libros
                </h5>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-bold text-white-50">Seleccione un autor</label>
                        <select id="cbAutor" class="form-select bg-dark text-white border border-warning"></select>
                    </div>

                    <div id="infoAutor" class="mt-4">

                        <h4 id="nombreAutor" class="text-warning fw-bold"></h4>

                        <div id="librosAutor" class="row mt-3"></div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/autor.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
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
                    <i class="mdi mdi-account-tie me-2 text-white"></i>
                    Autores y sus Libros
                </h5>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-bold text-white-50">Seleccione un autor</label>
                        <select id="cbAutor" class="form-select bg-dark text-white border border-warning"></select>
                    </div>

                    <div id="infoAutor" class="mt-4">

                        <h4 id="nombreAutor" class="text-warning fw-bold"></h4>

                        <div id="librosAutor" class="row mt-3"></div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/autor.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
} else {
    echo '<script>alert(\"Debe iniciar sesión para acceder al sistema\");window.location=\"../index.php\";</script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>