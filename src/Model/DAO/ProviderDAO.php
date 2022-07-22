<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class ProviderDAO implements DAO 
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection -> prepare("INSERT INTO provider VALUES (?,?,?,?);");
        $stmt -> bindParam(1, $object->cnpj);
        $stmt -> bindParam(2, $object ->name);
        $stmt ->bindParam(3, $object -> phone);
        $stmt -> bindParam(4, $object -> address -> id);
        return $stmt ->execute();
    }

    public function findOne($id)
    {
        
    }

    public function findAll()
    {
        $connection = Connection::getConnection();
        $stmt = $connection -> query("select * from provider; inner join address;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($object)
    {
        
    }

    public function delete($id)
    {
        
    }
}

