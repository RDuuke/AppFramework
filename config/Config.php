<?php

/* Data BD configuration*/
$dataDB = [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'app',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
/* TimeZone*/
$timezone = new \DateTime('America/Bogota');

/* Configuration URL*/
define('BASE_URL', 'http://localhost:8080/newbie');

define('BASE_PUBLIC', 'http://localhost:8080/newbie/public');