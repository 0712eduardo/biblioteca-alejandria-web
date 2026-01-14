<<<<<<< HEAD
<div class="modal fade" id="AgregarLector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Lector</h5>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-12">
              <label class="col-form-label">Nombres</label>
              <input type="text" class="form-control" id="nom" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese Nombres">
            </div>
            <div class="col-12">
              <label class="col-form-label">Dirección</label>
              <input type="text" class="form-control" id="dir" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese Dirección">
            </div>
            <div class="col-12">
              <label class="col-form-label">Teléfono</label>
              <input type="text" class="form-control" id="tel" placeholder="Ingrese Teléfono">
            </div>
            <div class="col-12">
              <label class="col-form-label">Condición</label>
              <select class="form-select" id="con">
                <option selected>-- Elija Condición --</option>
                <option>ACTIVO</option>
                <option>DESACTIVO</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button type="button" class="btn btn-primary" onclick="Agregar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarLector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Editar Lector</h5>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-close-box mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <input type="hidden" id="idLector" class="form-control">
            <div class="col-12">
              <label class="col-form-label">Nombres</label>
              <input type="text" class="form-control" id="Enom" onkeyup="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-12">
              <label class="col-form-label">Dirección</label>
              <input type="text" class="form-control" id="Edir" onkeyup="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-12">
              <label class="col-form-label">Teléfono</label>
              <input type="text" class="form-control" id="Etel">
            </div>
            <div class="col-12">
              <label class="col-form-label">Condición</label>
              <select class="form-select" id="Econ">
                <option selected>-- Elija Condición --</option>
                <option>ACTIVO</option>
                <option>DESACTIVO</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button type="button" class="btn btn-primary" onclick="Editar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>
    </div>
  </div>
</div>
=======
<div class="modal fade" id="AgregarLector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Lector</h5>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-12">
              <label class="col-form-label">Nombres</label>
              <input type="text" class="form-control" id="nom" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese Nombres">
            </div>
            <div class="col-12">
              <label class="col-form-label">Dirección</label>
              <input type="text" class="form-control" id="dir" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese Dirección">
            </div>
            <div class="col-12">
              <label class="col-form-label">Teléfono</label>
              <input type="text" class="form-control" id="tel" placeholder="Ingrese Teléfono">
            </div>
            <div class="col-12">
              <label class="col-form-label">Condición</label>
              <select class="form-select" id="con">
                <option selected>-- Elija Condición --</option>
                <option>ACTIVO</option>
                <option>DESACTIVO</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button type="button" class="btn btn-primary" onclick="Agregar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarLector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Editar Lector</h5>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="mdi mdi-close-box mdi-36px text-primary"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <input type="hidden" id="idLector" class="form-control">
            <div class="col-12">
              <label class="col-form-label">Nombres</label>
              <input type="text" class="form-control" id="Enom" onkeyup="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-12">
              <label class="col-form-label">Dirección</label>
              <input type="text" class="form-control" id="Edir" onkeyup="this.value=this.value.toUpperCase()">
            </div>
            <div class="col-12">
              <label class="col-form-label">Teléfono</label>
              <input type="text" class="form-control" id="Etel">
            </div>
            <div class="col-12">
              <label class="col-form-label">Condición</label>
              <select class="form-select" id="Econ">
                <option selected>-- Elija Condición --</option>
                <option>ACTIVO</option>
                <option>DESACTIVO</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i class="mdi mdi-cancel mdi-24px"></i></button>
        <button type="button" class="btn btn-primary" onclick="Editar()"><i class="mdi mdi-content-save mdi-24px"></i></button>
      </div>
    </div>
  </div>
</div>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
