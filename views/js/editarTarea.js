function crearModalEdicion(identificador) {

    let tdnombre =`tdnombre${identificador}`;
    let tdfecha =`tdfecha${identificador}`;
    
    const nombreOld = document.getElementById(tdnombre).innerText ;
    const $fechaCambiar = document.getElementById(tdfecha).innerText ;
    const fechaOld = $fechaCambiar.slice(6, 10) + "-" + $fechaCambiar.slice(3, 5) + "-" + $fechaCambiar.slice(0, 2);


    let modalEditar = document.createElement('div');
    modalEditar.innerHTML =
        `<div class="modal" id="editarTarea" tabindex="-1" data-backdrop="false" data-dismiss="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Tarea ${identificador}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form id="formGuardar">
          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control" name="nombre" id="nombre" required placeholder="Nombre" value="${nombreOld}">
            <label for="nombre">Nombre</label>
          </div>
          <div class="form-floating mb-3">
          <input
              type="date"
              class="form-control" name="fecha" required id="fecha" placeholder="Fecha" value="${fechaOld}">
            <label for="fecha">Fecha</label>
          </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-cancelar" data-bs-dismiss="modal">Cancelar</button>
            <a type="button" id="${identificador}" class="btn btn-primary btn-editar">Guardar </a>
          </div>
        </div>
      </div>
    </div>`;

    document.querySelector('#mdEditar').append(modalEditar);
    const myModalEditar = new bootstrap.Modal('#editarTarea');
    myModalEditar.show()
    console.log("modalMetido");


    $btnEditar = document.querySelector(".btn-editar");
    $alerta = document.querySelector("#alerta");


    $btnEditar.onclick = async () => {


        const id = $btnEditar.id;
        const $nombre = document.querySelector("#nombre");
        const $fecha = document.querySelector("#fecha");

        const cargar = {
            id: id,
            nombre: $nombre.value,
            fecha: $fecha.value
        };


        const cargaJson = JSON.stringify(cargar);

        try {
            const respuestaRaw = await fetch(`/mvc/tareas/update/${id}`, {

                method: "POST",
                body: cargaJson
            });

            const respuesta = await respuestaRaw.json();

            console.log(respuesta);

            if (respuesta) {

                const response = `Tarea ${id} modificada`;
                $alerta.innerHTML=
                    '<div id="alertOK" class="alert alert-success fade show"role="alert">' +
                    response +
                    "";

                //Cerrar el modal
                myModalEditar.hide();
                modalEditar.remove();

                // Modificar la fila
                let tdnombre =`tdnombre${id}`;
                let tdfecha =`tdfecha${id}`;
                document.getElementById(tdnombre).innerText = respuesta.nombre;
                document.getElementById(tdfecha).innerText = (respuesta.fecha).slice(8, 10) + "/" + (respuesta.fecha).slice(5, 7) + "/" + (respuesta.fecha).slice(0, 4);


            }
        } catch (e) {
            $alerta.innerHTML=

                '<div id="alertOK" class="alert alert-danger  fade show"role="alert">' +
                "El proceso de modificaci??n de la tarea ha fallado, consulte con el administrador del sistema."
            ;
        }

    };

}



