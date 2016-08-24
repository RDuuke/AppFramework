<?php

namespace App\Models;

use App\Models\Model;

class Users extends Model
{
    protected  $table = 'users';

    public $email;
    public $name;

    public function create($password, $rol)
    {
        $prepare = $this->connection->prepare("INSERT INTO $this->table (email, name, password, rol) VALUES (:email, :name, md5(:password), :rol) ");
        $prepare->bindParam(":email", $this->email, \PDO::PARAM_STR);
        $prepare->bindParam(":name", $this->name, \PDO::PARAM_STR);
        $prepare->bindParam(":password", $password, \PDO::PARAM_INT);
        $prepare->bindParam(":rol", $rol, \PDO::PARAM_INT);
        $prepare->execute();
    }

    public function update($id, $request)
    {
        if ($request->password == "") {
            $prepare = $this->connection->prepare("UPDATE $this->table SET email = :email, name = :name, rol = :rol WHERE id = :id");

        } else {

            $prepare = $this->connection->prepare("UPDATE $this->table SET email = :email, name = :name, password = MD5(:password), rol = :rol WHERE id = :id");
            $prepare->bindParam(":password", $request->password, \PDO::PARAM_INT);
        }
        $prepare->bindParam(":email", $this->email, \PDO::PARAM_STR);
        $prepare->bindParam(":name", $this->name, \PDO::PARAM_STR);
        $prepare->bindParam(":rol", $request->rol, \PDO::PARAM_INT);
        $prepare->bindParam(":id", $id, \PDO::PARAM_INT);
        if(!$prepare->execute()){
            print_r($prepare->errorInfo());
            exit();
        }
    }
}