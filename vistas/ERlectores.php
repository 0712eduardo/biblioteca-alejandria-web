<<<<<<< HEAD
<?php
session_start();
if(isset($_SESSION['perfil']) && isset($_SESSION['usuario']))
{
require_once '../parte_superior.php';
require_once 'ModalERlectores.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <h5 class="card-header bg-warning text-dark">Reporte Específico de Lectores</h5>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Seleccione Condición</label>
                            <div class="input-group">
                                <input type="text" id="cond" class="form-control bg-dark text-white border-warning" readonly placeholder="Seleccione condición">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ACondicionLector">
                                    <i class="mdi mdi-magnify text-dark"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Acciones</label>
                            <div class="input-group">
                                <button class="btn btn-warning me-2" title="Imprimir" onclick="r_lectores()">
                                    <i class="mdi mdi-printer mdi-18px text-dark"></i>
                                </button>
                                <button class="btn btn-success" title="Limpiar" onclick="limpiar()">
                                    <i class="mdi mdi-note-outline mdi-18px text-white"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <table id="dtERLectores" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="bg-warning text-dark text-center">
                                <th>CÓD</th>
                                <th>NOMBRE</th>
                                <th>DIRECCIÓN</th>
                                <th>TELÉFONO</th>
                                <th>CONDICIÓN</th>
                                <th>F. REGISTRO</th>
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
echo "<script src='../js/ERlectores.js'></script>";
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
require_once 'ModalERlectores.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <h5 class="card-header bg-warning text-dark">Reporte Específico de Lectores</h5>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Seleccione Condición</label>
                            <div class="input-group">
                                <input type="text" id="cond" class="form-control bg-dark text-white border-warning" readonly placeholder="Seleccione condición">
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ACondicionLector">
                                    <i class="mdi mdi-magnify text-dark"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Acciones</label>
                            <div class="input-group">
                                <button class="btn btn-warning me-2" title="Imprimir" onclick="r_lectores()">
                                    <i class="mdi mdi-printer mdi-18px text-dark"></i>
                                </button>
                                <button class="btn btn-success" title="Limpiar" onclick="limpiar()">
                                    <i class="mdi mdi-note-outline mdi-18px text-white"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <table id="dtERLectores" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="bg-warning text-dark text-center">
                                <th>CÓD</th>
                                <th>NOMBRE</th>
                                <th>DIRECCIÓN</th>
                                <th>TELÉFONO</th>
                                <th>CONDICIÓN</th>
                                <th>F. REGISTRO</th>
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
echo "<script src='../js/ERlectores.js'></script>";
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