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
    public function all(){
        $result = $this->connection->query("SELECT * FROM $this->table");
        $data = $result->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

    /**
     * Find method, search for the primary key in the model
     * @param $id int
     * @return mixed
     */
    public function find($id){
        $data = $this->connection->query("SELECT * FROM $this->table WHERE $this->primaryKey = $id");
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

    public function last()
    {
        $data = $this->connection->query("SELECT * FROM $this->table ORDER BY id DESC LIMIT 1");
        $data = $data->fetch(\PDO::FETCH_OBJ);
        return $data;
    }

    public function first(){
        $data = $this->connection->query("SELECT * FROM $this->table ORDER BY id ASC LIMIT 1");
        $data = $data->fetch(\PDO::FETCH_OBJ);
        return $data;
    }

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