<?php

namespace Config;


class Autoload
{
    /**
     * GetLoader method loads all classes
     * @param $ruta
     */
    static public function getLoader(){
        spl_autoload_register(function($class){
            $ruta = str_replace("\\", "/", $class) . ".php";
            include '../'.$ruta;
        });
    }
}