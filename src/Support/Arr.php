<?php
namespace Santa\Support;

class Arr
{

    public static function only($array,$key)
    {
        return array_intersect_key($array,array_flip((array) $key));
    }
    
 
    public static function accessible($value)
    {
        return $value instanceof ArrayAccess || is_array($value);
    }

    public static function exists($array,$key)
    {

        if($array instanceof ArrayAccess){
            return $array->offsetExists($key);
        }
        return array_key_exists($key,$array);
    }

    public static function has($array,$keys)
    {

        if($keys ==''){
            return false;
        }

        $keys = (array) $keys;

        if($keys == []){
            return false;
        }

        foreach($keys as $key){

            $subArray = $array;

            if(static::exists($array,$key)){
                return true;
            }

            foreach(explode('.',$key) as $segment){

                if(static::accessible($subArray) && static::exists($subArray,$segment)){
                    $subArray = $subArray[$segment];
                }else {
                    return false;
                }

            }

        }
        return true;
    }


    public static function flatten($array,$depth = INF)
    {

        $result = [];

        foreach($array as $item){

            if(!is_array($item)){
                $result[] = $item;
                
            }elseif($depth == 1){
                $result = array_merge($result,array_values($item));
            }else {
                $result = array_merge($result,static::flatten($item,$depth - 1));
            }
        }
        return $result;
    }

    public static function last($array,callable $callback = null,$default = null)
    {

        if(empty($callback)){
            return is_null($array) ? value($default) : end($array);
        }

        return static::first(array_reverse($array,true),$callback,$default);
    }

    public static function first($array,callable $callback = null,$default = null)
    {

        if(empty($callback)){
            if(is_null($array)){
                return value($default);
            }

            foreach($array as $item){
                return $item;
            }
        }

        foreach($array as $key => $value){
            if($callback($value,$key)){
                return call_user_func($callback,$value,$key);
            }
        }

    }

    public static function unset($array,$key)
    {
        return static::set($array,$key,null);
    }

    public static function get($array,$key,$default = null)
    {

        if($key == ''){
            return ;
        }

        if(static::exists($array,$key)){
            return $array[$key];
        }

        $keys = explode('.',$key);

        while(count($keys) > 1){

            $key = array_shift($keys);

            if(static::accessible($array) && static::exists($array,$key)){
                $array = $array[$key];
            }else {
                return ($default);
            }

        }
        
        return $array[array_shift($keys)];

    }

    public static function set(&$array,$key,$value)
    {
        if($key == ''){
            return ;
        }

        $keys = explode('.',$key);

        while(count($keys) > 1){
            $key = array_shift($keys);

            if(static::accessible($array) && static::exists($array,$key)){
                $array = &$array[$key];
            }else {
                return 'notfound';
            }
        }
        return $array[array_shift($keys)] = $value;
    }

}