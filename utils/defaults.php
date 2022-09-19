<?php


// NO OLVIDAR METER ESTE FICHERO EN EL ROUTER
if (!function_exists("view")) {    
    
    function view($nombreVista, $params)
    {
        foreach($params as $key => $param){
            $$key = $param;
        }

        $vista = explode('.', $nombreVista);
        include_once "./views/{$vista[0]}/{$vista[1]}.php";    }
}
