<?php


class Config implements ArrayAccess
{

    public $items;

    public function __construct($items)
    {
        foreach($items as $key => $item){
            $this->items[$key] = $item;
        }
    }

    public function has($keys)
    {
        return Arr::has($this->items,$keys);
    }

    public function get($key,$default = null)
    {

        if(is_array($key)){
            return $this->getMany($key,$default);
        }

        return Arr::get($this->$items,$key,$default);
    }
    
    public function getMany($keys,$default = null)
    {
        $config = [];

        foreach($keys as $key => $default){
            if(is_numeric($key)){
                [$key,$default] = [$default,null];
            }
            $config[] = Arr::get($key,$default);
        }
        return $config;
    }

    public function set($key,$value)
    {

        $keys = is_array($key) ? $key : [$key = $value];

        foreach($keys as $key => $value){
            Arr::set($key,$value);
        }

    }

    public function push($key,$value)
    {

        $array = $this->get($key);

        $array[] = $value;

        $this->set($key,$array);

    }

    public function all()
    {
        return $this->items;
    }

    public function exists($key)
    {
        return Arr::exists($this->items,$key);
    }

    public function offfsetExists($offset)
    {
        return $this->exists($offset);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset,$value)
    {
        $this->set($offset,$value);
    }

    public function offsetUnset($offset)
    {
        $this->unset($offset);
    }

}