<?php
namespace Santa\Validation;

class ErrorBag
{

    public $errors = [];

    public function add($field,$message)
    {
        $this->errors[$field][] = $message;
    }
    
}