<<<<<<< HEAD
<?php
require_once '../modelos/conexion.php';
$conex = new Conexion();
$stmt = $conex->prepare("SELECT idcategoria, nombre FROM categoria WHERE condicion IN ('A', 'ACTIVO')");
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="modal fade" id="AgregarLibro" tabindex="-1" aria-labelledby="AgregarLibroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Agregar Libro</h5>
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label>Título</label>
                        <input type="text" id="titulo" class="form-control" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese título">
                    </div>

                    <div class="mb-3">
                        <label>Autor</label>
                        <input type="text" id="autor" class="form-control" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese autor">
                    </div>
                    <div class="mb-3">
                        <label>Portada</label>
                        <input type="file" id="portada" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label>Año</label>
                        <input type="number" id="anio" class="form-control" placeholder="Ingrese año">
                    </div>

                    <div class="mb-3">
                        <label>Categoría</label>
                        <select id="id_categoria" class="form-select">
                  <option value="" selected>-- Seleccione Categoría --</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat->idcategoria ?>"><?= $cat->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Stock Total</label>
                            <input type="number" id="stock_total" class="form-control" placeholder="Ingrese stock total">
                        </div>
                        <div class="col-6 mb-3">
                            <label>Stock Disponible</label>
                            <input type="number" id="stock_disponible" class="form-control" placeholder="Ingrese stock disponible">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Condición</label>
                        <select id="condicion" class="form-select">
                            <option selected>-- Seleccione --</option>
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>
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

<div class="modal fade" id="EditarLibro" tabindex="-1" aria-labelledby="EditarLibroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Editar Libro</h5>
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-box mdi-36px text-primary"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="idLibro">

                    <div class="mb-3">
                        <label>Título</label>
                        <input type="text" id="Etitulo" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Autor</label>
                        <input type="text" id="Eautor" class="form-control">
                    </div>
                    <div class="mb-3">
                    <label>Portada</label>
                    <input type="file" id="Eportada" class="form-control" accept="image/*">
                    <img id="PreviewPortada" src="" class="img-thumbnail mt-2" style="width: 120px;">
                </div>

                    <div class="mb-3">
                        <label>Año</label>
                        <input type="number" id="Eanio" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Categoría</label>
                        <select id="Eid_categoria" class="form-select">
                          <option value="" selected>-- Seleccione Categoría --</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat->idcategoria ?>"><?= $cat->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Stock Total</label>
                            <input type="number" id="Estock_total" class="form-control">
                        </div>
                        <div class="col-6 mb-3">
                            <label>Stock Disponible</label>
                            <input type="number" id="Estock_disponible" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Condición</label>
                        <select id="Econdicion" class="form-select">
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>
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
$stmt = $conex->prepare("SELECT idcategoria, nombre FROM categoria WHERE condicion IN ('A', 'ACTIVO')");
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="modal fade" id="AgregarLibro" tabindex="-1" aria-labelledby="AgregarLibroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Agregar Libro</h5>
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-box-outline mdi-36px text-primary"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label>Título</label>
                        <input type="text" id="titulo" class="form-control" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese título">
                    </div>

                    <div class="mb-3">
                        <label>Autor</label>
                        <input type="text" id="autor" class="form-control" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ingrese autor">
                    </div>
                    <div class="mb-3">
                        <label>Portada</label>
                        <input type="file" id="portada" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label>Año</label>
                        <input type="number" id="anio" class="form-control" placeholder="Ingrese año">
                    </div>

                    <div class="mb-3">
                        <label>Categoría</label>
                        <select id="id_categoria" class="form-select">
                  <option value="" selected>-- Seleccione Categoría --</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat->idcategoria ?>"><?= $cat->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Stock Total</label>
                            <input type="number" id="stock_total" class="form-control" placeholder="Ingrese stock total">
                        </div>
                        <div class="col-6 mb-3">
                            <label>Stock Disponible</label>
                            <input type="number" id="stock_disponible" class="form-control" placeholder="Ingrese stock disponible">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Condición</label>
                        <select id="condicion" class="form-select">
                            <option selected>-- Seleccione --</option>
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>
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

<div class="modal fade" id="EditarLibro" tabindex="-1" aria-labelledby="EditarLibroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Editar Libro</h5>
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-box mdi-36px text-primary"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="idLibro">

                    <div class="mb-3">
                        <label>Título</label>
                        <input type="text" id="Etitulo" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Autor</label>
                        <input type="text" id="Eautor" class="form-control">
                    </div>
                    <div class="mb-3">
                    <label>Portada</label>
                    <input type="file" id="Eportada" class="form-control" accept="image/*">
                    <img id="PreviewPortada" src="" class="img-thumbnail mt-2" style="width: 120px;">
                </div>

                    <div class="mb-3">
                        <label>Año</label>
                        <input type="number" id="Eanio" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Categoría</label>
                        <select id="Eid_categoria" class="form-select">
                          <option value="" selected>-- Seleccione Categoría --</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat->idcategoria ?>"><?= $cat->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Stock Total</label>
                            <input type="number" id="Estock_total" class="form-control">
                        </div>
                        <div class="col-6 mb-3">
                            <label>Stock Disponible</label>
                            <input type="number" id="Estock_disponible" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Condición</label>
                        <select id="Econdicion" class="form-select">
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>
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