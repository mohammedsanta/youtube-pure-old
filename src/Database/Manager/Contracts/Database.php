<?php
namespace Santa\Database\Manager\Contracts;

interface Database
{

    public function Connect() : \PDO;

    public function create(Array $data);

    public function query(string $query,$value = []);

    public function read($column = '*',$filter = []);

    public function update($id,$data);

    public function delete($id);

}