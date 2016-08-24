<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
define("___NEWBIE___", "aplication");
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
require_once '../config/Request.php';
require_once '../config/Router.php';
require_once '../config/Config.php';
require_once '../src/App/Tools/Helpers.php';
require_once '../vendor/autoload.php';
Config\Router::Run(new Config\Request());
