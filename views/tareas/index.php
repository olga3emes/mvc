<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Propios -->

    <script defer src="views/js/crearTarea.js"></script>
    <script defer src="views/js/borrarTarea.js"></script>
    <script defer src="views/js/editarTarea.js"></script>
</head>

<body>

    <div class="container">

        <div class="row"></div>
            <h1 class="m-3 text-center">Listado de tareas</h1>
            <div class="text-center m-3">
                <button type="button" id="crear" class="btn btn-outline-dark " onclick="crearModalCrear()" data-bs-toggle="modal"
                    data-bs-target="#crearTarea"><i class="bi bi-plus-square-fill"></i> Nueva Tarea</button>
            </div>

             <div id="alerta" class="d-grid justify-content-center m-2"></div>

            <div class="table-responsive">
                <table id="table" class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody id="bodyTabla">
                        <?php foreach ($tareas as $t): ?>
                        <tr id="tr<?php echo $t->id; ?>" class="">
                            <td>
                                <?php echo $t->id; ?>
                            </td>
                            <td>
                                <?php echo $t->nombre; ?>
                            </td>
                            <td>
                                <?php echo date_format(date_create($t->fecha), "d/m/Y"); ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-light btn-sm"><i
                                            class="bi bi-eye-fill"></i></button>
                                    <button type="button" onclick='crearModalEdicion("<?php echo $t->id; ?>","<?php echo $t->nombre; ?>","<?php echo $t->fecha; ?>")' data-bs-toggle="modal" data-bs-target="#editarTarea"  class="btn btn-secondary btn-sm"><i
                                            class="bi bi-pencil-fill"></i></button>
                                    <button type="button" onclick='crearModalBorrado("<?php echo $t->id; ?>")' data-bs-toggle="modal" data-bs-target="#eliminarTarea" class="btn btn-dark btn-sm"><i
                                            class="bi bi-trash3-fill"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            
        </div>
    </div>
    
    <div id="mdEliminar"></div>
    <div id="mdCrear"></div>
    <div id="mdEditar"></div>
    

  

</body>

</html> 