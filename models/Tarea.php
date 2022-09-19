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

    public function save(){

        $params = [":nombre"=>$this->nombre, ":fecha"=>$this->fecha];
        if(empty($this->id)){
            $prepare = $this->prepare("Insert into tareas (nombre, fecha) values (:nombre,:fecha)");
            $prepare->execute($params);
        }else
            $params[":id"]=$this->id;    
            $prepare = $this->prepare("update tareas set nombre=:nombre, fecha=:fecha where id=:id");
            $prepare->execute($params);
        }

    
        public function remove(){
            $prepare = $this->prepare("delete from tareas where id=:id");
            $prepare->execute([":id"=>$this->id]);
        }



}