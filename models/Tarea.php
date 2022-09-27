<?php
include_once ("DB.php");
class Tarea extends DB
{
    //Atributos de la clase
    public $id;
    public $nombre;
    public $fecha;

    public static function all()
    {
        $db = new DB();
        $prepare = $db->prepare("SELECT * FROM tareas");
        $prepare->execute();

        //return $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $prepare->fetchAll(PDO::FETCH_CLASS, Tarea::class);
    }

    public static function find($id)
    {
        $db = new DB();
        $prepare = $db->prepare("Select * from tareas where id=:id");
        $prepare->execute([":id" => $id]);

        return $prepare->fetchObject(Tarea::class);

    }

    public function save()
    {
        $params =[":nombre" => $this->nombre, ":fecha" => $this->fecha];
        if (empty($this->id)) {
            $prepare = $this->prepare("Insert into tareas(nombre,fecha) values (:nombre,:fecha)");
            $prepare->execute($params);
            $prepare2 = $this->prepare("SELECT MAX(id) id FROM tareas");
            $prepare2->execute();
            $this->id = $prepare2->fetch(PDO::FETCH_ASSOC)["id"];
        }
        else {
            $params[":id"]=$this->id;
            $prepare = $this->prepare("update tareas set nombre=:nombre, fecha=:fecha where id=:id");
            $prepare->execute($params);
        }
    }

    public function remove(){
        $prepare = $this->prepare("delete from tareas where id=:id");
        $prepare->execute([":id" => $this->id]);
    }




}