<?php
session_start();
define("___NEWBIE___", "aplication");
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
require_once '../config/Autoload.php';
require_once '../config/Config.php';
require_once '../app/Tools/Helpers.php';
Config\Autoload::getLoader();
Config\Router::Run(new Config\Request());
