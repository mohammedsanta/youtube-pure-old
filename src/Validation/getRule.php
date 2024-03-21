<?php
namespace Santa\Validation;

use Santa\Validation\Rules\BetweenRule;
use Santa\Validation\Rules\RequiredRule;



class getRule
{

    public static $maps = [
        'required' => RequiredRule::class,
        'between' => BetweenRule::class,
    ];

    public static function getFromString($rule)
    {

        $theRule = explode(':',$rule);
        $rule = array_shift($theRule);

        ($theRule != []) ? $options = $theRule[0] : $options = '';

        $options = explode(',',$options);

        return new static::$maps[$rule](...$options);
    }

}