<<<<<<< HEAD
<?php
session_start();
if(isset($_SESSION['perfil']) && isset($_SESSION['usuario']))
{
    require_once '../parte_superior.php';
    require_once 'ModalERfactura.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-12">
      <div class="card shadow">

        <h5 class="card-header bg-warning text-dark">Reporte Específico de Facturas</h5>

        <div class="card-body">

          <div class="row">

            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold text-white">Período / Estado</label>
              <div class="input-group">
                <input type="text" id="periodo_fact_texto"
                       class="form-control bg-dark text-white border-warning"
                       readonly placeholder="Seleccione período y estado">

                <input type="hidden" id="mes_fact">
                <input type="hidden" id="anio_fact">
                <input type="hidden" id="estado_fact" value="TODOS">

                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#AFacturaPeriodo">
                  <i class="mdi mdi-calendar text-dark"></i>
                </button>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold text-white">Acciones</label>
              <div class="input-group">

              

                <button class="btn btn-warning me-2" onclick="r_facturas()" title="Imprimir">
                  <i class="mdi mdi-printer text-dark"></i>
                </button>

                <button class="btn btn-success" onclick="limpiarFactura()" title="Limpiar">
                  <i class="mdi mdi-note-outline text-white"></i>
                </button>

              </div>
            </div>

          </div>

          <table id="dtERFactura" class="table table-bordered table-striped table-hover text-center">
            <thead class="bg-warning text-dark">
              <tr>
                <th>ID</th>
                <th>Lector</th>
                <th>Libro</th>
                <th>F. Préstamo</th>
                <th>F. Devolución</th>
                <th>F. Factura</th>
                <th>Subtotal</th>
                <th>IGV</th>
                <th>Total</th>
                <th>Estado</th>
              </tr>
            </thead>

            <tbody id="datosFactura" class="text-white"></tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/datatable.js'></script>";
    echo "<script src='../js/ERfactura.js'></script>";
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
    require_once 'ModalERfactura.php';
?>
<link rel="stylesheet" href="../assets/css/diseñoTabla.css">

<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-12">
      <div class="card shadow">

        <h5 class="card-header bg-warning text-dark">Reporte Específico de Facturas</h5>

        <div class="card-body">

          <div class="row">

            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold text-white">Período / Estado</label>
              <div class="input-group">
                <input type="text" id="periodo_fact_texto"
                       class="form-control bg-dark text-white border-warning"
                       readonly placeholder="Seleccione período y estado">

                <input type="hidden" id="mes_fact">
                <input type="hidden" id="anio_fact">
                <input type="hidden" id="estado_fact" value="TODOS">

                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#AFacturaPeriodo">
                  <i class="mdi mdi-calendar text-dark"></i>
                </button>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold text-white">Acciones</label>
              <div class="input-group">

              

                <button class="btn btn-warning me-2" onclick="r_facturas()" title="Imprimir">
                  <i class="mdi mdi-printer text-dark"></i>
                </button>

                <button class="btn btn-success" onclick="limpiarFactura()" title="Limpiar">
                  <i class="mdi mdi-note-outline text-white"></i>
                </button>

              </div>
            </div>

          </div>

          <table id="dtERFactura" class="table table-bordered table-striped table-hover text-center">
            <thead class="bg-warning text-dark">
              <tr>
                <th>ID</th>
                <th>Lector</th>
                <th>Libro</th>
                <th>F. Préstamo</th>
                <th>F. Devolución</th>
                <th>F. Factura</th>
                <th>Subtotal</th>
                <th>IGV</th>
                <th>Total</th>
                <th>Estado</th>
              </tr>
            </thead>

            <tbody id="datosFactura" class="text-white"></tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
    require_once '../parte_inferior.php';
    echo "<script src='../js/datatable.js'></script>";
    echo "<script src='../js/ERfactura.js'></script>";
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