<<<<<<< HEAD
<?php
session_start();
if (isset($_SESSION['perfil']) and isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
    require_once 'ModalERlibro.php';
    require_once 'ModalERlibroAutores.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <h5 class="card-header bg-warning text-dark">Reporte Específico de Libros</h5>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Seleccione Categoría</label>
                            <div class="input-group">
                                <input type="text" id="cat" class="form-control bg-dark text-white border-warning" disabled>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#ACategorias">
                                    <i class="fas fa-search text-dark"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Seleccione Autor</label>
                            <div class="input-group">
                                <input type="text" id="aut" class="form-control bg-dark text-white border-warning" disabled>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#AAutores">
                                    <i class="fas fa-search text-dark"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 text-center">
                            <button class="btn btn-warning me-2" title="Imprimir" onclick="r_libros()">
                                <i class="mdi mdi-printer mdi-18px text-dark"></i>
                            </button>
                            <button class="btn btn-success" title="Limpiar" onclick="limpiar()">
                                <i class="mdi mdi-note-outline mdi-18px text-white"></i>
                            </button>
                        </div>

                    </div>

                    <table id="dtERLibro" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="bg-warning text-dark text-center">
                                <th>CÓD</th>
                                <th>PORTADA</th>
                                <th>TÍTULO</th>
                                <th>AUTOR</th>
                                <th>AÑO</th>
                                <th>STOCK</th>
                                <th>DISP.</th>
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
    echo "<script src='../js/ERlibros.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/salir.js'></script>";
} else {
    echo '<script>
    alert("Debe iniciar sesión para continuar");
    window.location="../index.php";
    </script>';
}
=======
<?php
session_start();
if (isset($_SESSION['perfil']) and isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
    require_once 'ModalERlibro.php';
    require_once 'ModalERlibroAutores.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <h5 class="card-header bg-warning text-dark">Reporte Específico de Libros</h5>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Seleccione Categoría</label>
                            <div class="input-group">
                                <input type="text" id="cat" class="form-control bg-dark text-white border-warning" disabled>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#ACategorias">
                                    <i class="fas fa-search text-dark"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Seleccione Autor</label>
                            <div class="input-group">
                                <input type="text" id="aut" class="form-control bg-dark text-white border-warning" disabled>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#AAutores">
                                    <i class="fas fa-search text-dark"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 text-center">
                            <button class="btn btn-warning me-2" title="Imprimir" onclick="r_libros()">
                                <i class="mdi mdi-printer mdi-18px text-dark"></i>
                            </button>
                            <button class="btn btn-success" title="Limpiar" onclick="limpiar()">
                                <i class="mdi mdi-note-outline mdi-18px text-white"></i>
                            </button>
                        </div>

                    </div>

                    <table id="dtERLibro" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="bg-warning text-dark text-center">
                                <th>CÓD</th>
                                <th>PORTADA</th>
                                <th>TÍTULO</th>
                                <th>AUTOR</th>
                                <th>AÑO</th>
                                <th>STOCK</th>
                                <th>DISP.</th>
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
    echo "<script src='../js/ERlibros.js'></script>";
    echo "<script src='../js/datatable.js'></script>";
    echo "<script src='../js/mensaje.js'></script>";
    echo "<script src='../js/salir.js'></script>";
} else {
    echo '<script>
    alert("Debe iniciar sesión para continuar");
    window.location="../index.php";
    </script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>