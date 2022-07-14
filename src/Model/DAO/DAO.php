<?php

namespace APP\Model\DAO;

interface DAO{
    function insert($object);
    public function findOne($id);
    public function findAll();
    public function update($object);
    public function delete($id);
};