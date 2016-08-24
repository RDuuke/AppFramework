<?php
/* Data BD configuration*/

/* TimeZone*/
$timezone =  new \DateTime('America/Bogota');

/* Configuration URL*/
define('BASE_URL', 'http://localhost:8080/newbie');
define('BASE_PUBLIC','http://localhost:8080/newbie/public');

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule  = new Capsule();
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'app',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);


// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
$whoops->register();