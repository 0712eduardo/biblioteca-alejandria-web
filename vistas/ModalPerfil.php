<<<<<<< HEAD
<div class="modal fade" id="AgregarPerfil" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-light">
        <h5 class="modal-title">Agregar Perfil</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>

      <div class="modal-body">
        <form>

          <div class="mb-3">
            <label>Nombre del Perfil</label>
            <input type="text" id="nombre_perfil" class="form-control" onkeyup="this.value=this.value.toUpperCase()">
          </div>

          <div class="mb-3">
            <label>Estado</label>
            <select id="estado" class="form-select">
              <option selected>-- Seleccione --</option>
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button class="btn btn-primary" onclick="Agregar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="EditarPerfil" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-light">
        <h5 class="modal-title">Editar Perfil</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>

      <div class="modal-body">
        <form>
          <input type="hidden" id="idPerfil">

          <div class="mb-3">
            <label>Nombre del Perfil</label>
            <input type="text" id="Enombre_perfil" class="form-control" onkeyup="this.value=this.value.toUpperCase()">
          </div>

          <div class="mb-3">
            <label>Estado</label>
            <select id="Eestado" class="form-select">
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button class="btn btn-primary" onclick="Editar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>

    </div>
  </div>
=======
<div class="modal fade" id="AgregarPerfil" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-light">
        <h5 class="modal-title">Agregar Perfil</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>

      <div class="modal-body">
        <form>

          <div class="mb-3">
            <label>Nombre del Perfil</label>
            <input type="text" id="nombre_perfil" class="form-control" onkeyup="this.value=this.value.toUpperCase()">
          </div>

          <div class="mb-3">
            <label>Estado</label>
            <select id="estado" class="form-select">
              <option selected>-- Seleccione --</option>
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button class="btn btn-primary" onclick="Agregar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="EditarPerfil" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-light">
        <h5 class="modal-title">Editar Perfil</h5>
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>

      <div class="modal-body">
        <form>
          <input type="hidden" id="idPerfil">

          <div class="mb-3">
            <label>Nombre del Perfil</label>
            <input type="text" id="Enombre_perfil" class="form-control" onkeyup="this.value=this.value.toUpperCase()">
          </div>

          <div class="mb-3">
            <label>Estado</label>
            <select id="Eestado" class="form-select">
              <option value="A">ACTIVO</option>
              <option value="I">INACTIVO</option>
            </select>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button class="btn btn-primary" onclick="Editar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>

    </div>
  </div>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
</div>