<?php
namespace Santa\Support;

class Session
{

    public function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }
    
    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public function __construct()
    {
        $flash_messages = $_SESSION['flash_messages'] ?? [];

        foreach($flash_messages as &$flash_message){
            $flash_message['remove'] = true;
        }
        $_SESSION['flash_messages'] = $flash_messages;
    }

    public function setFlash($key,$message)
    {
        $_SESSION['flash_messages'][$key] = [
            'remove' => false,
            'content' => $message,
        ];
    }

    public function hasFlash($key)
    {
        return isset($_SESSION['flash_messages'][$key]);
    }


    public function __destruct()
    {
        $this->remove();
    }

    public function remove()
    {

        $flash_messages = $_SESSION['flash_messages'] ?? [];
        
        foreach($flash_messages as $key => $flash_message){
            if($flash_message['remove']){
                unset($flash_messages[$key]);
            }
        }
        $_SESSION['flash_messages'] = $flash_messages;
    }

    public function profile($key)
    {
        return $_SESSION['user_profile']->$key;
    }

    public function getFlash($key)
    {
        return $_SESSION['flash_messages'][$key]['content'] ?? false;
    }

}