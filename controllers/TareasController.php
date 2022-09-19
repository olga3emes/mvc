<?php 
include_once "models/Tareas.php";
class TareasController{

    public function index(){
        
       $tareas= Tarea::all();
       echo json_encode($tareas);

    }

    public function find($id){
        $tarea= Tarea::find($id);

        echo json_encode($tarea);
    }

    public function create(){

        $tarea= new Tarea();
        $tarea->nombre="Nombre tarea";
        $tarea->fecha="2022-03-02";
        $tarea->save();
        echo "La tarea ha sido creada" . json_encode($tarea);
    }

    public function update($id){
        $tarea= Tarea::find($id);
        if($tarea){
        $tarea->nombre="Nombre tarea actualizada";
        $tarea->fecha="2022-04-09";
        $tarea->save();
        echo "La tarea ha sido actualizada";
        }else{
            echo "La tarea no existe";
        }
    }

    public function delete($id){
        $tarea= Tarea::find($id);
        if($tarea){
            $tarea->remove();

            echo "La tarea ha sido eliminada";
        }else{
            echo "La tarea no existe";
        }

    }

    //Index o Read - Listar los objetos
    //Create - Crear el objeto
    //Update - Modificar un objeto existente
    //Delete - Eliminar un objeto
    //Find - Buscar un objeto concreto usando su id
}