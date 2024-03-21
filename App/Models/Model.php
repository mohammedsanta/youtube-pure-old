<?php
namespace App\Models;

use Santa\Support\Str;

abstract class Model
{

    protected static $instance;

    public static function create($attributes)
    {
        static::$instance = static::class;

        return app()->db->create($attributes);
    }

    public static function query($query,$value = [])
    {
        static::$instance = static::class;

        return app()->db->query($query,$value = []);
    }

    public static function where($filter,$columns = '*')
    {
        static::$instance = static::class;

        return app()->db->read($columns,$filter);
    }

    public static function all($filter = [],$columns = '*')
    {
        static::$instance = static::class;

        return app()->db->read($columns,$filter);
    }

    public static function update($id,$data)
    {
        static::$instance = static::class;

        return app()->db->update($id,$data);
    }

    public static function delete($id)
    {
        static::$instance = static::class;

        return app()->db->delete($id);
    }

    public static function getModel()
    {
        return static::$instance;
    }

    public static function getTableName()
    {
        return Str::strtolower(Str::plural(class_basename(static::$instance)));
    }

}