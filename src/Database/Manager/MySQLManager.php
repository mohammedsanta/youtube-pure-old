<?php
namespace Santa\Database\Manager;

use Santa\Database\Grammar\MySQLGrammar;
use Santa\Database\Manager\Contracts\Database;

class MySQLManager implements Database
{

    protected static $instance;

    public function connect() : \PDO
    {
        if(!static::$instance){
            static::$instance = new \PDO('mysql:host=localhost;dbname=youtube','root','');
        }
        return static::$instance;
    }

    public function create($data)
    {
        $query = MySQLGrammar::buildInsertQuery(array_keys($data));

        $stmt = static::$instance->prepare($query);
        
        for($i = 1;$i <= count($values = array_values($data));$i++){
            $stmt->bindValue($i,$values[$i - 1]);
        }
        
        return $stmt->execute();
    }

    public function query(string $query,$value = [])
    {
        $stmt = static::$instance->prepare($query);

        for($i = 1;$i <= count($value);$i++){
            $stmt->bindValue($i,$values[$i - 1]);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function read($column = '*',$filter = [])
    {

        $query = MySQLGrammar::buildSelectQuery($filter);

        $stmt = static::$instance->prepare($query);

        if($filter){
            $stmt->bindValue(1,$filter[2]);
        }

        $stmt->execute();
        return $stmt->fetchALL(\PDO::FETCH_CLASS);
    }

    public function update($id,$data)
    {
        $query = MySQLGrammar::buildUpdateQuery(array_keys($data));
        
        $stmt = static::$instance->prepare($query);
        
        for($i = 1;$i <= count($values = array_values($data));$i++){
            $stmt->bindValue($i,$values[$i - 1]);

            if($i == count($data)){
                $stmt->bindValue($i + 1,$id);
            }
        }
        
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = MySQLGrammar::buildDeleteQuery();

        $stmt = static::$instance->prepare($query);

        $stmt->bindValue(1,$id);

        return $stmt->execute();
    }

}