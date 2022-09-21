const myModal = new bootstrap.Modal("#crearTarea");

$nombre = document.querySelector("#nombre");
$fecha = document.querySelector("#fecha");

$btnGuardar = document.querySelector(".btn-guardar");
$alerta = document.querySelector("#alerta");
$btnGuardar.onclick = async () => {
  const nombre = $nombre.value,
    fecha = new Date($fecha.value).toISOString().slice(0, 10);

  if (!nombre || !fecha) {
    $msg = "No ha rellenado los campos necesarios";
    return Error($msg);
  }

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

    if (respuesta) {
      myModal.hide();
      document.querySelector("#formGuardar").reset();
      const response = `La tarea ${respuesta.id} se ha creado con éxito`;
      $alerta.setHTML(
        '<div id="alertOK" class="alert alert-success fade show"role="alert">' +
          response +
          ""
      );
      console.log(respuesta);
      //Hay que crear la fila en la tabla
      let tr = document.createElement("tr");
      tr.setAttribute("data-id", respuesta.id);
      tr.innerHTML = `<td>${respuesta.id}</td>
                  <td>${respuesta.nombre}</td>
                  <td>${new Date(respuesta.fecha).toLocaleDateString("es-Es")}</td>
                  <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <button type="button" class="btn btn-light btn-sm"><i
                          class="bi bi-eye-fill"></i></button>
                  <button type="button" class="btn btn-secondary btn-sm"><i
                          class="bi bi-pencil-fill"></i></button>
                  <button type="button" class="btn btn-dark btn-sm"><i
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
