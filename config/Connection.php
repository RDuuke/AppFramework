<?php

namespace Config;


abstract class Connection
{
    /*protected $host = 'localhost';

    protected $user = 'root';

    protected $db = 'App';

    protected $password = '';*/

    protected $connection;

    public function __construct()
    {
        global $DB_DATOS;
        try{
            $this->connection = new \PDO('mysql:host=' . $DB_DATOS["DB_HOST"] . ';dbname=' . $DB_DATOS["DB_DBNAME"] . ';charset=utf8', $DB_DATOS["DB_USER"], $DB_DATOS["DB_PASSWORD"]);
        }catch (\PDOException $e) {
            print "!Error: " . $e->getMessage() . "!<br />";
            die();
        }

    }
}