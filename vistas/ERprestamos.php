<<<<<<< HEAD
<?php
session_start();
if(isset($_SESSION['perfil']) && isset($_SESSION['usuario']))
{
require_once '../parte_superior.php';
require_once 'ModalERprestamos.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
<div class="row">
<div class="col-12">
<div class="card shadow">

    <h5 class="card-header bg-warning text-dark">Reporte Específico de Préstamos</h5>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Periodo</label>
                <div class="input-group">
                    <input type="text" id="periodo_texto" class="form-control bg-dark text-white border-warning" readonly placeholder="Seleccione periodo">
                    <input type="hidden" id="mes">
                    <input type="hidden" id="anio">
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#APrestamoPeriodo">
                        <i class="mdi mdi-calendar text-dark"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Acciones</label>
                <div class="input-group">
                    <button class="btn btn-warning me-2" onclick="r_prestamos()" title="Imprimir">
                        <i class="mdi mdi-printer mdi-18px text-dark"></i>
                    </button>
                    <button class="btn btn-success" onclick="limpiar()" title="Limpiar">
                        <i class="mdi mdi-note-outline mdi-18px text-white"></i>
                    </button>
                </div>
            </div>

        </div>

        <table id="dtERPrestamos" class="table table-bordered table-striped table-hover">
            <thead class="bg-warning text-dark text-center">
            <tr>
                <th>CÓD</th>
                <th>LIBRO</th>
                <th>LECTOR</th>
                <th>F. PRÉSTAMO</th>
                <th>F. DEVOLUCIÓN</th>
                <th>CANTIDAD</th>
                <th>CONDICIÓN</th>
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
echo "<script src='../js/datatable.js'></script>";
echo "<script src='../js/ERprestamos.js'></script>";
echo "<script src='../js/mensaje.js'></script>";
echo "<script src='../js/salir.js'></script>";
}
else{
echo "<script>
alert('Debe iniciar sesión');
window.location='../index.php';
</script>";
}
=======
<?php
session_start();
if(isset($_SESSION['perfil']) && isset($_SESSION['usuario']))
{
require_once '../parte_superior.php';
require_once 'ModalERprestamos.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
<div class="row">
<div class="col-12">
<div class="card shadow">

    <h5 class="card-header bg-warning text-dark">Reporte Específico de Préstamos</h5>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Periodo</label>
                <div class="input-group">
                    <input type="text" id="periodo_texto" class="form-control bg-dark text-white border-warning" readonly placeholder="Seleccione periodo">
                    <input type="hidden" id="mes">
                    <input type="hidden" id="anio">
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#APrestamoPeriodo">
                        <i class="mdi mdi-calendar text-dark"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Acciones</label>
                <div class="input-group">
                    <button class="btn btn-warning me-2" onclick="r_prestamos()" title="Imprimir">
                        <i class="mdi mdi-printer mdi-18px text-dark"></i>
                    </button>
                    <button class="btn btn-success" onclick="limpiar()" title="Limpiar">
                        <i class="mdi mdi-note-outline mdi-18px text-white"></i>
                    </button>
                </div>
            </div>

        </div>

        <table id="dtERPrestamos" class="table table-bordered table-striped table-hover">
            <thead class="bg-warning text-dark text-center">
            <tr>
                <th>CÓD</th>
                <th>LIBRO</th>
                <th>LECTOR</th>
                <th>F. PRÉSTAMO</th>
                <th>F. DEVOLUCIÓN</th>
                <th>CANTIDAD</th>
                <th>CONDICIÓN</th>
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
echo "<script src='../js/datatable.js'></script>";
echo "<script src='../js/ERprestamos.js'></script>";
echo "<script src='../js/mensaje.js'></script>";
echo "<script src='../js/salir.js'></script>";
}
else{
echo "<script>
alert('Debe iniciar sesión');
window.location='../index.php';
</script>";
}
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
?>