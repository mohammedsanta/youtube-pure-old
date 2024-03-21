<?php
namespace Santa\Http;

class Response {
    
    public function setCode($code)
    {
        return http_response_code($code);
    }

    public function back()
    {
        return header("Location:".$_SERVER['REQUEST_URI']);
    }

}