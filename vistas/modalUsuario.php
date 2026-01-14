<<<<<<< HEAD
<?php
require_once '../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("SELECT id_perfil, nombre_perfil FROM perfil");
$stmt->execute();
$perfiles = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="modal fade" id="AgregarUsuario" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header header-gold">
        <h5 class="modal-title">Agregar Usuario</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <form>
          <div class="mb-2">
            <label>Nombre</label>
            <input type="text" id="nombre" class="form-control">
          </div>

          <div class="mb-2">
            <label>Usuario</label>
            <input type="text" id="usuario" class="form-control">
          </div>

          <div class="mb-2">
            <label>Clave</label>
            <input type="password" id="pass" class="form-control">
          </div>

          <div class="mb-2">
            <label>Perfil</label>
            <select id="id_perfil" class="form-select">
              <option value="">-- Seleccione Perfil --</option>
              <?php foreach ($perfiles as $p): ?>
                <option value="<?= $p->id_perfil ?>"><?= $p->nombre_perfil ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-2">
            <label>Estado</label>
            <select id="estado" class="form-select">
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>
        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-nuevo" onclick="Agregar()">Guardar</button>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="EditarUsuario" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header header-gold">
        <h5 class="modal-title">Editar Usuario</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <form>
          <input type="hidden" id="idUsuario">

          <div class="mb-2">
            <label>Nombre</label>
            <input type="text" id="Enombre" class="form-control">
          </div>

          <div class="mb-2">
            <label>Usuario</label>
            <input type="text" id="Eusuario" class="form-control">
          </div>

          <div class="mb-2">
            <label>Clave</label>
            <input type="password" id="Epass" class="form-control">
          </div>

          <div class="mb-2">
            <label>Perfil</label>
            <select id="Eid_perfil" class="form-select">
              <?php foreach ($perfiles as $p): ?>
                <option value="<?= $p->id_perfil ?>"><?= $p->nombre_perfil ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-2">
            <label>Estado</label>
            <select id="Eestado" class="form-select">
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-nuevo" onclick="Editar()">Guardar</button>
      </div>

    </div>
  </div>
=======
<?php
require_once '../modelos/conexion.php';
$conex = new Conexion();

$stmt = $conex->prepare("SELECT id_perfil, nombre_perfil FROM perfil");
$stmt->execute();
$perfiles = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="modal fade" id="AgregarUsuario" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header header-gold">
        <h5 class="modal-title">Agregar Usuario</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <form>
          <div class="mb-2">
            <label>Nombre</label>
            <input type="text" id="nombre" class="form-control">
          </div>

          <div class="mb-2">
            <label>Usuario</label>
            <input type="text" id="usuario" class="form-control">
          </div>

          <div class="mb-2">
            <label>Clave</label>
            <input type="password" id="pass" class="form-control">
          </div>

          <div class="mb-2">
            <label>Perfil</label>
            <select id="id_perfil" class="form-select">
              <option value="">-- Seleccione Perfil --</option>
              <?php foreach ($perfiles as $p): ?>
                <option value="<?= $p->id_perfil ?>"><?= $p->nombre_perfil ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-2">
            <label>Estado</label>
            <select id="estado" class="form-select">
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>
        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-nuevo" onclick="Agregar()">Guardar</button>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="EditarUsuario" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header header-gold">
        <h5 class="modal-title">Editar Usuario</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <form>
          <input type="hidden" id="idUsuario">

          <div class="mb-2">
            <label>Nombre</label>
            <input type="text" id="Enombre" class="form-control">
          </div>

          <div class="mb-2">
            <label>Usuario</label>
            <input type="text" id="Eusuario" class="form-control">
          </div>

          <div class="mb-2">
            <label>Clave</label>
            <input type="password" id="Epass" class="form-control">
          </div>

          <div class="mb-2">
            <label>Perfil</label>
            <select id="Eid_perfil" class="form-select">
              <?php foreach ($perfiles as $p): ?>
                <option value="<?= $p->id_perfil ?>"><?= $p->nombre_perfil ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-2">
            <label>Estado</label>
            <select id="Eestado" class="form-select">
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>

        </form>

      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-nuevo" onclick="Editar()">Guardar</button>
      </div>

    </div>
  </div>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
</div>