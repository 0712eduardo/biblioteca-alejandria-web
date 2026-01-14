<<<<<<< HEAD
<?php
require_once '../modelos/conexion.php';
$conex = new Conexion();

$stmtL = $conex->prepare("SELECT id_libro, titulo FROM libro WHERE condicion IN ('A', 'ACTIVO')");
$stmtL->execute();
$libros = $stmtL->fetchAll(PDO::FETCH_OBJ);

$stmtC = $conex->prepare("SELECT id_lector, nom_lector FROM lectores WHERE condicion IN ('A', 'ACTIVO')");
$stmtC->execute();
$lectores = $stmtC->fetchAll(PDO::FETCH_OBJ);
?>

<div class="modal fade" id="AgregarPrestamo" tabindex="-1" aria-labelledby="AgregarPrestamoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">Registrar Préstamo</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <label>Libro</label>
          <select id="id_libro" class="form-select">
            <option selected>-- Seleccione Libro --</option>
            <?php foreach ($libros as $lib): ?>
              <option value="<?= $lib->id_libro ?>"><?= $lib->titulo ?></option>
            <?php endforeach; ?>
          </select>

          <label>Lector</label>
          <select id="id_lector" class="form-select">
            <option selected>-- Seleccione Lector --</option>
            <?php foreach ($lectores as $lec): ?>
              <option value="<?= $lec->id_lector ?>"><?= $lec->nom_lector ?></option>
            <?php endforeach; ?>
          </select>

          <label>Fecha Préstamo</label>
          <input type="date" id="fechaPrestamo" class="form-control">

          <label>Fecha Devolución</label>
          <input type="date" id="fechaDevolucion" class="form-control">

          <label>Cantidad</label>
          <input type="number" id="cantidad" class="form-control">

          <label>Condición</label>
          <select id="condicion" class="form-select">
            <option selected>-- Seleccione --</option>
            <option>ACTIVO</option>
            <option>INACTIVO</option>
          </select>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal">
          <i class="mdi mdi-cancel mdi-24px"></i>
        </button>
        <button class="btn btn-primary" onclick="Agregar()">
          <i class="mdi mdi-content-save mdi-24px"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarPrestamo" tabindex="-1" aria-labelledby="EditarPrestamoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">Editar Préstamo</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="idPrestamo">

          <label>Libro</label>
          <select id="Eid_libro" class="form-select">
            <option selected>-- Seleccione Libro --</option>
            <?php foreach ($libros as $lib): ?>
              <option value="<?= $lib->id_libro ?>"><?= $lib->titulo ?></option>
            <?php endforeach; ?>
          </select>

          <label>Lector</label>
          <select id="Eid_lector" class="form-select">
            <option selected>-- Seleccione Lector --</option>
            <?php foreach ($lectores as $lec): ?>
              <option value="<?= $lec->id_lector ?>"><?= $lec->nom_lector ?></option>
            <?php endforeach; ?>
          </select>

          <label>Fecha Préstamo</label>
          <input type="date" id="EfechaPrestamo" class="form-control">

          <label>Fecha Devolución</label>
          <input type="date" id="EfechaDevolucion" class="form-control">

          <label>Cantidad</label>
          <input type="number" id="Ecantidad" class="form-control">

          <label>Condición</label>
          <select id="Econdicion" class="form-select">
            <option>ACTIVO</option>
            <option>INACTIVO</option>
          </select>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal">
          <i class="mdi mdi-cancel mdi-24px"></i>
        </button>
        <button class="btn btn-primary" onclick="Editar()">
          <i class="mdi mdi-content-save mdi-24px"></i>
        </button>
      </div>
    </div>
  </div>
=======
<?php
require_once '../modelos/conexion.php';
$conex = new Conexion();

$stmtL = $conex->prepare("SELECT id_libro, titulo FROM libro WHERE condicion IN ('A', 'ACTIVO')");
$stmtL->execute();
$libros = $stmtL->fetchAll(PDO::FETCH_OBJ);

$stmtC = $conex->prepare("SELECT id_lector, nom_lector FROM lectores WHERE condicion IN ('A', 'ACTIVO')");
$stmtC->execute();
$lectores = $stmtC->fetchAll(PDO::FETCH_OBJ);
?>

<div class="modal fade" id="AgregarPrestamo" tabindex="-1" aria-labelledby="AgregarPrestamoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">Registrar Préstamo</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <label>Libro</label>
          <select id="id_libro" class="form-select">
            <option selected>-- Seleccione Libro --</option>
            <?php foreach ($libros as $lib): ?>
              <option value="<?= $lib->id_libro ?>"><?= $lib->titulo ?></option>
            <?php endforeach; ?>
          </select>

          <label>Lector</label>
          <select id="id_lector" class="form-select">
            <option selected>-- Seleccione Lector --</option>
            <?php foreach ($lectores as $lec): ?>
              <option value="<?= $lec->id_lector ?>"><?= $lec->nom_lector ?></option>
            <?php endforeach; ?>
          </select>

          <label>Fecha Préstamo</label>
          <input type="date" id="fechaPrestamo" class="form-control">

          <label>Fecha Devolución</label>
          <input type="date" id="fechaDevolucion" class="form-control">

          <label>Cantidad</label>
          <input type="number" id="cantidad" class="form-control">

          <label>Condición</label>
          <select id="condicion" class="form-select">
            <option selected>-- Seleccione --</option>
            <option>ACTIVO</option>
            <option>INACTIVO</option>
          </select>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal">
          <i class="mdi mdi-cancel mdi-24px"></i>
        </button>
        <button class="btn btn-primary" onclick="Agregar()">
          <i class="mdi mdi-content-save mdi-24px"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarPrestamo" tabindex="-1" aria-labelledby="EditarPrestamoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">Editar Préstamo</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="idPrestamo">

          <label>Libro</label>
          <select id="Eid_libro" class="form-select">
            <option selected>-- Seleccione Libro --</option>
            <?php foreach ($libros as $lib): ?>
              <option value="<?= $lib->id_libro ?>"><?= $lib->titulo ?></option>
            <?php endforeach; ?>
          </select>

          <label>Lector</label>
          <select id="Eid_lector" class="form-select">
            <option selected>-- Seleccione Lector --</option>
            <?php foreach ($lectores as $lec): ?>
              <option value="<?= $lec->id_lector ?>"><?= $lec->nom_lector ?></option>
            <?php endforeach; ?>
          </select>

          <label>Fecha Préstamo</label>
          <input type="date" id="EfechaPrestamo" class="form-control">

          <label>Fecha Devolución</label>
          <input type="date" id="EfechaDevolucion" class="form-control">

          <label>Cantidad</label>
          <input type="number" id="Ecantidad" class="form-control">

          <label>Condición</label>
          <select id="Econdicion" class="form-select">
            <option>ACTIVO</option>
            <option>INACTIVO</option>
          </select>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal">
          <i class="mdi mdi-cancel mdi-24px"></i>
        </button>
        <button class="btn btn-primary" onclick="Editar()">
          <i class="mdi mdi-content-save mdi-24px"></i>
        </button>
      </div>
    </div>
  </div>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
</div>