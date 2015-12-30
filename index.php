<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('BASE_URL', 'http://localhost:8080/Blog');
require_once 'config/Autoload.php';
require_once 'app/Tools/Helpers.php';
Config\Autoload::getLoader();
Config\Router::Run(new Config\Request());
