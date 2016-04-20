<?php

namespace App\Models;


use Config\Connection;

abstract class Model extends Connection
{
    protected $table;
    protected $primaryKey = 'id';
    protected $connection;

    /**
     * All method, returns all the model data
     * @return mixed
     */
    public static function all(){
        $instance = new static;
        $result = $instance->connection->query("SELECT * FROM $instance->table");
        $data = $result->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

    /**
     * Find method, search for the primary key in the model
     * @param $id int
     * @return mixed
     */
    public static function find($id){
        $instance = new static;
        $data = $instance->connection->query("SELECT * FROM $instance->table WHERE $instance->primaryKey = $id");
        $data = $data->fetch(\PDO::FETCH_OBJ);
        return $data;
    }

    /**
     * Destroy method removes a record model for its primary key
     * @param $id
     */
    public function destroy($id)
    {
        $this->connection->query("DELETE FROM $this->table WHERE id = $id");
    }

    /**
     * @return mixed
     */
    public function last()
    {
        $data = $this->connection->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 1");
        $data = $data->fetch(\PDO::FETCH_OBJ);
        return $data;
    }

    /**
     * @return mixed
     */
    public function first(){
        $data = $this->connection->query("SELECT * FROM $this->table ORDER BY id ASC LIMIT 1");
        $data = $data->fetch(\PDO::FETCH_OBJ);
        return $data;
    }

    /**
     * @param $sql
     * @return bool
     */
    public function where($sql){
        $data = $this->connection->query("SELECT * FROM $this->table WHERE $sql");
        if($data->rowCount() > 1){
            $data = $data->fecthAll(\PDO::FETCH_OBJ);
        }elseif($data->rowCount() == 1){
            $data = $data->fetch(\PDO::FETCH_OBJ);
        }else{
            return false;
        }
        return $data;
    }

}