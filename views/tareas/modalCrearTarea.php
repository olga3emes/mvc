<div class="modal" id="crearTarea" tabindex="-1" aria-labelledby="Crear Tarea" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formGuardar">
                    <div class="form-floating mb-3">
                      <input
                        type="text"
                        class="form-control" name="nombre" id="nombre" required placeholder="Nombre">
                      <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input
                        type="date"
                        class="form-control" name="fecha" required id="fecha" placeholder="Fecha">
                      <label for="fecha">Fecha</label>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btn-guardar" class="btn btn-primary btn-guardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
