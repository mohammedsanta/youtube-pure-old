<?php
namespace Santa\Database;

use Santa\Database\Concerns\ConnectsTo;

class DB
{

    public $manager;

    public function __construct($manager)
    {
        $this->manager = $manager;
    }

    public function init()
    {
        ConnectsTo::connect($this->manager);
    }

    public function create($data)
    {
        return $this->manager->create($data);
    }

    public function query($query,$value = [])
    {
        return $this->manager->query($query,$value);
    }

    public function read($column = '*',$filter = [])
    {
        return $this->manager->read($column,$filter);
    }

    public function update($id,$data)
    {
        return $this->manager->update($id,$data);
    }

    public function delete($id)
    {
        return $this->manager->delete($id);
    }
    
}