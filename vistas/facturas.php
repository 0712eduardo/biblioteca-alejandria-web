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
                    <i class="mdi mdi-file-document-outline me-2 text-white"></i>
                    Facturas de Préstamos
                </h5>

                <div class="card-body">

                    <table id="dtFactura" class="table table-alejandria-gold table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>LECTOR</th>
                                <th>LIBRO</th>
                                <th>FECHA PRÉSTAMO</th>
                                <th>FECHA DEVOLUCIÓN</th>
                                <th>TIPO</th>
                                <th>SUBTOTAL</th>
                                <th>IGV</th>
                                <th>TOTAL</th>
                                <th>ESTADO</th>
                                <th>ACCIÓN</th>
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
require_once 'ModalFactura.php';
require_once '../parte_inferior.php';

echo "<script src='../js/facturas.js'></script>";
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
                    <i class="mdi mdi-file-document-outline me-2 text-white"></i>
                    Facturas de Préstamos
                </h5>

                <div class="card-body">

                    <table id="dtFactura" class="table table-alejandria-gold table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>LECTOR</th>
                                <th>LIBRO</th>
                                <th>FECHA PRÉSTAMO</th>
                                <th>FECHA DEVOLUCIÓN</th>
                                <th>TIPO</th>
                                <th>SUBTOTAL</th>
                                <th>IGV</th>
                                <th>TOTAL</th>
                                <th>ESTADO</th>
                                <th>ACCIÓN</th>
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
require_once 'ModalFactura.php';
require_once '../parte_inferior.php';

echo "<script src='../js/facturas.js'></script>";
echo "<script src='../js/datatable.js'></script>";
} else {
    echo '<script>alert(\"Debe iniciar sesión para acceder al sistema\");window.location=\"../index.php\";</script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>