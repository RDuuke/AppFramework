<?php

namespace App\Models;


use Config\Connection;

class Model extends Connection
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


}