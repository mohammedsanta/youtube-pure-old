<?php

use Santa\View\View;
use Santa\Application;
use Santa\Http\Request;
use Santa\Http\Response;

if(!function_exists('env')){
    function env($key = null){
        return $_ENV[$key] ?? value($key);
    }
}

if(!function_exists('value')){
    function value($value){
        return $default instanceof Closure ? $value() : $value;
    }
}

if(!function_exists('base_view')){
    function base_view(){
        return realpath(dirname(__FILE__)) . '/../../' ;
    }
}

if(!function_exists('views_path')){
    function views_path(){
        return base_view() . 'Views/';
    }
}

if(!function_exists('app')){
    function app() {
        
        static $instance = null;

        if(!$instance){
            $instance = new Application;
        }
        return $instance;
    }
}

if(!function_exists('request')){
    function request($key = null){

        $instance = new Request;

        if($key){
            return $instance->get($key);
        }

        if(is_array($key)){
            return $instance->only($key);
        }

        return $instance;
    }
}

if(!function_exists('old')){
    function old($key){
        if(app()->session->hasFlash($key)){
            return app()->session->getFlash($key)[0];
        }
    }
}

if(!function_exists('back')){
    function back(){
        return (new Response)->back();
    }
}

if(!function_exists('view')){
    function view($view,$params = []){
        return View::make($view,$params);
    }
}

if(!function_exists('class_basename')){
    function class_basename($class){
        is_object($class) ? get_class($class) : $class;

        return basename(str_replace('/','\\',$class));
    }
}

if(!function_exists('random')){
    function random($length = 11){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}