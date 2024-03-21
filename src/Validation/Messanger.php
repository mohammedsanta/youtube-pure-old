<?php
namespace Santa\Validation;

class Messanger
{

    public static function generate($rule,$field)
    {
        return str_replace('%s',$field,$rule);
    }

}