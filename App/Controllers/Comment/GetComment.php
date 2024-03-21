<?php
namespace App\Controllers\Comment;

class GetComment
{

    public $path;

    public $getcomments = [];

    public function __construct($url)
    {


        $this->path = 'users/'.$_SESSION['user_profile']->username.'/'.$_GET['v'].'/comments/';
        // $this->path = explode('/',$this->path);
        // $this->path = $this->path[0].'/'.$this->path[1].'/'.$this->path[2].'/comments/';
        $scan = scandir($this->path);

        // dump($scan);

        $content = [];

        
        foreach($scan as $file => $content){
            if($content == '.' || $content == '..'){
                continue;
            }
            $this->getcomments[] = require_once $this->path . $content;
        }

    }

    public function get()
    {
        return $this->getcomments;
    }

}

// $path = 'users\santa\2023-03-28-11-03-37\comments\\';

// $scan = scandir($path);

// $getcomments = [];
// $content = [];

// foreach($scan as $file => $content){
//     if($content == '.' || $content == '..'){
//         continue;
//     }
//     $getcomments[] = require_once $path . $content;
// }