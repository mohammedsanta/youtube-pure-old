<?php
namespace Santa\Http;

use Santa\View\View;
use Santa\Http\Request;
use Santa\Http\Response;
use App\Controllers\Auth\Authentication;

class Routes {
    
    public Request $request;
    public Response $response;

    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public static $routes = [];

    public static function get($route,$action)
    {
        static::$routes['get'][$route] = $action;
    }

    public static function post($route,$action)
    {
        static::$routes['post'][$route] = $action;
    }

    public function dispatch()
    {

        $params = '';
        $path = $this->request->path();
        $method = $this->request->method();

        $explode = explode('/',$path);
        array_shift($explode);

        if(in_array('url',$explode)){
            $path = '/'.$explode[0].'/'.$explode[1];

            $params = end($explode);
        }

        $action = static::$routes[$method][$path] ?? false;


        Authentication::isloged();
        
        if(!array_key_exists($path,static::$routes[$method])){
            View::makeError();
        }

        if(is_callable($action)){
            return call_user_func($action,[]);
        }

        if(is_array($action)){
            return call_user_func([new $action[0],$action[1]],[$params]);
        }

    }

}