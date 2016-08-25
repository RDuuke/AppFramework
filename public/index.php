<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)).DS);

require_once '../bootstrap/app.php';
RDuuke\Newbie\Core\Router::Run(new RDuuke\Newbie\Core\Request());
