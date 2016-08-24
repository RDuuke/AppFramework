<?php
session_start();
define("___NEWBIE___", "aplication");
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);

require_once '../bootstrap/app.php';
Config\Router::Run(new Config\Request());
