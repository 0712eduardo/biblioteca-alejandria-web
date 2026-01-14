<<<<<<< HEAD
<?php
session_start();
if (isset($_SESSION['perfil']) and isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
    
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">
<style>
    .card {
        background-color: #2A2D38 !important; 
        border: none !important;
        border-radius: 10px;
    }

    .card-header {
        background-color: #c79c22 !important;
        color: #fff !important;
        font-weight: bold;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        background-color: #2A2D38 !important;
        color: #fff !important;
    }

    table {
        color: #fff !important;
    }

    thead.table-warning {
        background-color: #c79c22 !important;
        color: #000 !important;
    }

    thead.table-warning th {
        color: #000 !important;
        font-weight: bold;
    }

    .table tbody tr td,
    .table tbody tr th,
    .table tbody td,
    .table tbody th,
    #tablaPrestamos td,
    #tablaPrestamos th {
        color: #fff !important;
    }

    .table tbody tr {
        background-color: #2A2D38 !important;
    }
    .table tbody tr:nth-child(even) {
        background-color: #24262F !important;
    }

    .table-hover tbody tr:hover td {
        background-color: #3A3D47 !important;
        color: #fff !important;
    }

    .img-tabla {
        width: 45px;
        height: 55px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #c79c22;
        cursor: pointer;
    }

    #anioSelect {
        background-color: #1F2128;
        color: white;
        border: 1px solid #c79c22;
    }

    #anioSelect option {
        background-color: #2A2D38;
        color: white;
    }

    #anioSelect:focus {
        background-color: #1F2128;
        border-color: #e6b838;
        box-shadow: 0 0 5px #c79c22;
    }

    #imgPortadaFull {
        max-width: 80%;       
        max-height: 80vh;    
        object-fit: contain;  
        border-radius: 10px;
        border: 2px solid #c79c22;
        box-shadow: 0 0 15px rgba(0,0,0,0.6);
    }

    #modalPortada .modal-dialog {
        max-width: 900px !important;
    }

    #modalPortada .modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #1F2128;
    }

    #modalPortada .modal-content {
        background-color: #2A2D38;
        border: 1px solid #c79c22;
        border-radius: 12px;
    }

    #modalPortada .modal-header {
        background-color: #c79c22;
        color: #fff;
        border-bottom: 1px solid #c79c22;
    }

    #modalPortada .btn-close {
        background-color: white;
        border-radius: 50%;
    }
</style>

<div class="container-fluid mt-4">
    <div class="row g-4">

        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <i class="mdi mdi-book-open-page-variant"></i> ÚLTIMOS 10 PRÉSTAMOS
                </div>
                <div class="card-body" style="max-height: 460px; overflow-y:auto;">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-warning text-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Portada</th>
                                <th>Libro</th>
                                <th>Lector</th>
                                <th>F. Prést.</th>
                                <th>F. Dev.</th>
                                <th>Cant.</th>
                                <th>Cond.</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPrestamos"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <i class="mdi mdi-chart-bar"></i> PRÉSTAMOS POR MES
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="fw-bold">Seleccione Año:</label>
                        <select id="anioSelect" class="form-select">
                            <option value="2024">2024</option>
                            <option value="2025" selected>2025</option>
                            <option value="2026">2026</option>
                        </select>
                    </div>
                    <canvas id="graficoPrestamos" height="240"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="modal fade" id="modalPortada" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background:#1F2128; border:1px solid #c79c22;">
            <div class="modal-header" style="border-bottom:1px solid #c79c22;">
                <h5 class="modal-title text-white">Vista de Portada</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="imgPortadaFull" src="" class="img-fluid rounded border" style="border-color:#c79c22;">
            </div>
        </div>
    </div>
</div>

</div> 

<?php
require_once '../parte_inferior.php';
echo '<script src="../js/home.js"></script>';
echo '<script src="../js/salir.js"></script>';
} else {
    echo '<script>
        alert("Debe iniciar sesión para ingresar al sistema");
        window.location="../index.php";
    </script>';
}
=======
<?php
session_start();
if (isset($_SESSION['perfil']) and isset($_SESSION['usuario'])) {
    require_once '../parte_superior.php';
    
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">
<style>
    .card {
        background-color: #2A2D38 !important; 
        border: none !important;
        border-radius: 10px;
    }

    .card-header {
        background-color: #c79c22 !important;
        color: #fff !important;
        font-weight: bold;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        background-color: #2A2D38 !important;
        color: #fff !important;
    }

    table {
        color: #fff !important;
    }

    thead.table-warning {
        background-color: #c79c22 !important;
        color: #000 !important;
    }

    thead.table-warning th {
        color: #000 !important;
        font-weight: bold;
    }

    .table tbody tr td,
    .table tbody tr th,
    .table tbody td,
    .table tbody th,
    #tablaPrestamos td,
    #tablaPrestamos th {
        color: #fff !important;
    }

    .table tbody tr {
        background-color: #2A2D38 !important;
    }
    .table tbody tr:nth-child(even) {
        background-color: #24262F !important;
    }

    .table-hover tbody tr:hover td {
        background-color: #3A3D47 !important;
        color: #fff !important;
    }

    .img-tabla {
        width: 45px;
        height: 55px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #c79c22;
        cursor: pointer;
    }

    #anioSelect {
        background-color: #1F2128;
        color: white;
        border: 1px solid #c79c22;
    }

    #anioSelect option {
        background-color: #2A2D38;
        color: white;
    }

    #anioSelect:focus {
        background-color: #1F2128;
        border-color: #e6b838;
        box-shadow: 0 0 5px #c79c22;
    }

    #imgPortadaFull {
        max-width: 80%;       
        max-height: 80vh;    
        object-fit: contain;  
        border-radius: 10px;
        border: 2px solid #c79c22;
        box-shadow: 0 0 15px rgba(0,0,0,0.6);
    }

    #modalPortada .modal-dialog {
        max-width: 900px !important;
    }

    #modalPortada .modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #1F2128;
    }

    #modalPortada .modal-content {
        background-color: #2A2D38;
        border: 1px solid #c79c22;
        border-radius: 12px;
    }

    #modalPortada .modal-header {
        background-color: #c79c22;
        color: #fff;
        border-bottom: 1px solid #c79c22;
    }

    #modalPortada .btn-close {
        background-color: white;
        border-radius: 50%;
    }
</style>

<div class="container-fluid mt-4">
    <div class="row g-4">

        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <i class="mdi mdi-book-open-page-variant"></i> ÚLTIMOS 10 PRÉSTAMOS
                </div>
                <div class="card-body" style="max-height: 460px; overflow-y:auto;">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-warning text-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Portada</th>
                                <th>Libro</th>
                                <th>Lector</th>
                                <th>F. Prést.</th>
                                <th>F. Dev.</th>
                                <th>Cant.</th>
                                <th>Cond.</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPrestamos"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <i class="mdi mdi-chart-bar"></i> PRÉSTAMOS POR MES
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="fw-bold">Seleccione Año:</label>
                        <select id="anioSelect" class="form-select">
                            <option value="2024">2024</option>
                            <option value="2025" selected>2025</option>
                            <option value="2026">2026</option>
                        </select>
                    </div>
                    <canvas id="graficoPrestamos" height="240"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="modal fade" id="modalPortada" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background:#1F2128; border:1px solid #c79c22;">
            <div class="modal-header" style="border-bottom:1px solid #c79c22;">
                <h5 class="modal-title text-white">Vista de Portada</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="imgPortadaFull" src="" class="img-fluid rounded border" style="border-color:#c79c22;">
            </div>
        </div>
    </div>
</div>

</div> 

<?php
require_once '../parte_inferior.php';
echo '<script src="../js/home.js"></script>';
echo '<script src="../js/salir.js"></script>';
} else {
    echo '<script>
        alert("Debe iniciar sesión para ingresar al sistema");
        window.location="../index.php";
    </script>';
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>