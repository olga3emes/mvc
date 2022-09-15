<?php 
include_once "models/Tareas.php";
class TareasController{

    public function index(){
        
       $tareas= Tarea::all();

       echo json_encode($tareas);

    }

    public function create(){

        echo "Create";
    }

    public function update(){
        echo "Actualizar";
    }


    //Index o Read - Listar los objetos
    //Create - Crear el objeto
    //Update - Modificar un objeto existente
    //Delete - Eliminar un objeto
    //Find - Buscar un objeto concreto usando su id
}