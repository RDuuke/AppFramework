<?php
/**
 * Created by PhpStorm.
 * User: RDuuke
 * Date: 29/12/2015
 * Time: 06:34 PM
 */

namespace Config;


abstract class Connection
{
    protected $host = 'localhost';

    protected $user = 'root';

    protected $db = 'app';

    protected $password = '';

    protected $connection;

    public function __construct()
    {
        $this->connection = new \PDO('mysql:host=' .$this->host .';dbname=' .$this->db .';', $this->user, $this->password );

    }
}