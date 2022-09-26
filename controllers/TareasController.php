<?php
include_once "models/Tarea.php";

class TareasController
{   
    public function index()
    {
        $tareas = Tarea::all();
        view("tareas.index", ["tareas" => $tareas]);

    }

    public function find($id)
    {
        $tarea = Tarea::find($id);
        echo json_encode($tarea);
    }

    public function create()
    {
        
        $cargaUtil = json_decode(file_get_contents("php://input"));
        if (!$cargaUtil) {
            http_response_code(500);
            exit;
        }
        $tarea = new Tarea();
        $tarea->nombre = $cargaUtil->nombre;
        $tarea->fecha = $cargaUtil->fecha;
        $tarea->save();
        $respuesta = $tarea;
        echo json_encode($respuesta);
    }

    public function update($id)
    {
        $cargaUtil = json_decode(file_get_contents("php://input"));
        if (!$cargaUtil) {
            http_response_code(500);
            exit;
        }
        $tarea = Tarea::find($id);
        if ($tarea) {
            $tarea->nombre = $cargaUtil->nombre;
            $tarea->fecha = $cargaUtil->fecha;
            $tarea->save();
            $respuesta=$tarea;
            echo json_encode($respuesta);     
        }
        else {
            http_response_code(404);
            exit;
        }
    }

    public function delete($id)
    {
        $cargaUtil = json_decode(file_get_contents("php://input"));
        if (!$cargaUtil) {
            http_response_code(500);
            exit;
        }
        $tarea = Tarea::find($id);
        if ($tarea) {
            $tarea->remove();
            $respuesta="La tarea ha sido eliminada";
            echo json_encode($respuesta);
        }
        else {
            http_response_code(404);
            exit;
        }

    }


//Index o Read - Listar
//Show o Find - Mostrar un elemento según su id
//Create - Crear un elemento nuevo
//Update - Editar un elemento (id)
//Delete - Eliminar un elemento (id)
}

?>