function crearModalBorrado(identificador) {
  
  let modalBorrar = document.createElement('div');
  modalBorrar.innerHTML =
    `<div class="modal" id="eliminarTarea" tabindex="-1" data-backdrop="false" data-dismiss="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar Tarea ${identificador}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Está seguro de que quiere <strong>eliminar</strong> esta tarea?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-cancelar" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" id="${identificador}" class="btn btn-primary btn-eliminar">Eliminar</a>
      </div>
    </div>
  </div>
</div>`;

  document.querySelector('#mdEliminar').append(modalBorrar);
  const myModalBorrar = new bootstrap.Modal('#eliminarTarea');
  myModalBorrar.show()
  console.log("modalMetido");


  $btnBorrar = document.querySelector(".btn-eliminar");
  $alerta = document.querySelector("#alerta");

  $btnBorrar.onclick = async () => {

    const id = $btnBorrar.id;

    const cargar = {
      id: id,
    };

    console.log(id);
    const cargaJson = JSON.stringify(cargar);

    try {
      const respuestaRaw = await fetch(`/mvc/tareas/delete/${id}`, {

        method: "POST",
        body: cargaJson
      });

      const respuesta = await respuestaRaw.json();

      console.log(respuesta);

      if (respuesta) {

        const response = `Tarea ${id} borrada`;
        $alerta.setHTML(
          '<div id="alertOK" class="alert alert-success fade show"role="alert">' +
          response +
          ""
        );

        //Cerrar el modal
        myModalBorrar.hide();
        modalBorrar.remove();
        //Quitar la fila

        let trEliminar = `tr${id}`;
        $fila = document.getElementById(trEliminar);
        $fila.remove();

      }
    } catch (e) {
      $alerta.setHTML(

        '<div id="alertOK" class="alert alert-danger  fade show"role="alert">' +
        "El proceso de creación de la tarea ha fallado, consulte con el administrador del sistema."
      );
    }
  };
}



