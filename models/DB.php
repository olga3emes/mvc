<?php

class DB extends PDO{

    public function __construct(){
        $con ="mysql:host=localhost;dbname=mvc";
        parent::__construct($con,"root", "");
        //le pasamos los parametros: conexion, usuario y contraseña.
    }
}