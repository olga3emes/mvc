<div class="modal" id="eliminarTarea" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Está seguro de que quiere <strong>eliminar</strong> esta tarea?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" id="<?php if($t) echo $t->id;?>" class="btn btn-primary btn-eliminar">Eliminar</a>
      </div>
    </div>
  </div>
</div>