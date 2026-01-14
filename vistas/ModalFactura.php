<<<<<<< HEAD
<div class="modal fade" id="ModalFactura" tabindex="-1" aria-labelledby="ModalFacturaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="ModalFacturaLabel">Editar Factura</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="formFactura">
          <input type="hidden" id="id_factura" name="id_factura">

          <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal (S/)</label>
            <input type="number" id="subtotal" name="subtotal" class="form-control" step="0.01" required>
          </div>

          <div class="mb-3">
            <label for="igv" class="form-label">IGV (18%)</label>
            <input type="number" id="igv" name="igv" class="form-control" step="0.01" readonly>
          </div>

          <div class="mb-3">
            <label for="total" class="form-label">Total (S/)</label>
            <input type="number" id="total" name="total" class="form-control" step="0.01" readonly>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="GuardarCambios()">Guardar</button>
      </div>
    </div>
  </div>
=======
<div class="modal fade" id="ModalFactura" tabindex="-1" aria-labelledby="ModalFacturaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="ModalFacturaLabel">Editar Factura</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="formFactura">
          <input type="hidden" id="id_factura" name="id_factura">

          <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal (S/)</label>
            <input type="number" id="subtotal" name="subtotal" class="form-control" step="0.01" required>
          </div>

          <div class="mb-3">
            <label for="igv" class="form-label">IGV (18%)</label>
            <input type="number" id="igv" name="igv" class="form-control" step="0.01" readonly>
          </div>

          <div class="mb-3">
            <label for="total" class="form-label">Total (S/)</label>
            <input type="number" id="total" name="total" class="form-control" step="0.01" readonly>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="GuardarCambios()">Guardar</button>
      </div>
    </div>
  </div>
>>>>>>> 9857ee2 (Proyecto académico Biblioteca Alejandría - MVC)
</div>