<?php

class DB extends PDO{

    public function __construct(){
        $con ="mysql:host=localhost;dbname=mvc";
        parent::__construct($con,"root", "");
        //le pasamos los parametros: conexion, usuario y contraseña.
    }
    
/*
   
    public function __construct(){
        $con ="mysql:host=bbdd.olgacei.com;dbname=ddb192481";
        try {
        parent::__construct($con,"ddb192481", "olgaCe1bbdd");
    }catch(PDOException $e){

        echo "Error: " . $e->getMessage();
    }    
        //le pasamos los parametros: conexion, usuario y contraseña.
    }
    */
}