<?php
namespace Santa\Database\Grammar;

use App\Models\Model;

class MySQLGrammar
{

    public static function buildInsertQuery($keys)
    {
        $values = '';
        for($i = 1;$i <= count($keys);$i++){
            $values .= '?, ';
        }

        return "INSERT INTO " . Model::getTableName() . " (`" . implode('`,`',$keys) . "`) VALUES(" . rtrim($values,', ') . ")";
    }

    public static function buildSelectQuery($filter = [])
    {
        $query = "SELECT * FROM " . Model::getTableName();

        if($filter){
            $query .= " WHERE {$filter[0]} {$filter[1]} ?";
        }
        return $query;
    }

    public static function buildUpdateQuery($keys)
    {
        $values = '';
        foreach($keys as $key){
            $values .= $key . '=?, ';
        }

        return "UPDATE " . Model::getTableName() . " SET " . rtrim($values,', ') . " WHERE id=?";
    }

    public static function buildDeleteQuery()
    {
        return "DELETE FROM " . Model::getTableName() . " WHERE id = ?";
    }

}