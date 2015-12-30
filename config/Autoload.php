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

            include $class . '.php';
        });
    }
}