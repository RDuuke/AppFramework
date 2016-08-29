<?php

require_once '../vendor/autoload.php';
require_once '../config/Config.php';
require_once '../src/Tools/Helpers.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection($dataDB);
$capsule->bootEloquent();

