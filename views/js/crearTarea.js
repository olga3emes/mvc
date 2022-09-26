function crearModalCrear() {

  if (document.querySelector("#editarTarea")) {
    document.querySelector("#editarTarea").remove();
  }
  if (document.querySelector("#borrarTarea")) {
    document.querySelector("#borrarTarea").remove();

  }
  if (document.querySelector("#crearTarea")) {
    document.querySelector("#crearTarea").remove();

  }

  let modalCrear = document.createElement('div');
  modalCrear.innerHTML =
    `<div class="modal" id="crearTarea" tabindex="-1" aria-labelledby="Crear Tarea" aria-hidden="true">
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
</div>`;

  document.querySelector('#mdCrear').append(modalCrear);
  const myModalCrear = new bootstrap.Modal('#crearTarea');
  myModalCrear.show()


  $nombre = document.querySelector("#nombre");
  $fecha = document.querySelector("#fecha");

  $btnGuardar = document.querySelector(".btn-guardar");
  $alerta = document.querySelector("#alerta");

  $btnGuardar.onclick = async () => {
    const nombre = $nombre.value,
      fecha = new Date($fecha.value).toISOString().slice(0, 10);

    const cargar = {
      nombre: nombre,
      fecha: fecha,
    };

    const cargaJson = JSON.stringify(cargar);

    try {
      const respuestaRaw = await fetch("/mvc/tareas/create", {
        method: "POST",
        body: cargaJson,
      });

      const respuesta = await respuestaRaw.json();

      console.log(respuesta);
      if (respuesta) {
        myModalCrear.hide();
        modalCrear.remove();
        const response = `La tarea ${respuesta.id} se ha creado con éxito`;
        $alerta.setHTML(
          '<div id="alertOK" class="alert alert-success fade show"role="alert">' +
          response +
          ""
        );

        //Hay que crear la fila en la tabla
        let tr = document.createElement("tr");
        tr.id = `tr${respuesta.id}`;
        tr.setAttribute("data-id", respuesta.id);
        tr.innerHTML = `<td>${respuesta.id}</td>
                  <td>${respuesta.nombre}</td>
                  <td>${new Date(respuesta.fecha).toLocaleDateString("es-Es")}</td>
                  <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <button type="button" class="btn btn-light btn-sm"><i
                          class="bi bi-eye-fill"></i></button>
                  <button type="button" class="btn btn-secondary btn-sm"><i
                          class="bi bi-pencil-fill"></i></button>
                  <button type="button" onclick='crearModalBorrado("${respuesta.id}")' data-bs-toggle="modal" data-bs-target="#eliminarTarea"
                   class="btn btn-dark btn-sm"><i
                          class="bi bi-trash3-fill"></i></button>
              </div>
              </td> `;
        document.getElementById("table").querySelector("tbody").append(tr);

      }
    } catch (e) {
      $alerta.setHTML(

        '<div id="alertOK" class="alert alert-danger  fade show"role="alert">' +
        "El proceso de creación de la tarea ha fallado, consulte con el administrador del sistema."
      );
    }
  };

}

