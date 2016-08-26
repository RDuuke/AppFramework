<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)).DS);

require_once '../bootstrap/app.php';
require_once '../src/routes.php';

$app->run();
