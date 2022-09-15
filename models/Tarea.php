<?php

class Tarea extends DB{

    public $id;
    public $nombre;
    public $fecha;


    public static function all(){
        $db = new DB();
        $prepare = $db->prepare("Select * from tareas");
        $prepare->execute();

        return $prepare->fetchAll(PDO::FETCH_CLASS,Tarea::class);
    }

    public static function find($id){

        $db = new DB();
        $prepare = $db->prepare("select * from tareas where id=:id");
        $prepare->execute([":id"=>$id]);

        return $prepare->fetchObject(Tarea::class);

    }

}