<?php
namespace App\Controllers\Comment;

class WriteComment
{

    public $id;
    public $username;
    public $profile;
    public $comment;
    public $date;

    public  $path;

    public $namefilecomment;

    public $text;

    public $fhandler;

    public function __construct($video)
    {
        $this->path = 'users/'.$video[0]->username.'/'.$video[0]->id_key.'/comments/';

        $this->id = $_SESSION['user_profile']->id;
        $this->username  = $_SESSION['user_profile']->username;
        $this->profile  = $_SESSION['user_profile']->profile_pic;
        $this->comment  = request('comment');
        $this->date  = date('Y-m-d-h-m-s').$this->username;
        $this->namefilecomment = str_replace('-','',$this->date);

        $this->text = "<?php
        return \$d$this->namefilecomment = [
                'idUsername' => '$this->id',
                'username' => '$this->username',
                'profilePic' => '$this->profile',
                'comment' => '$this->comment'
        ];";

        $this->fhandler = fopen($this->path.date('Y-m-d-h-m-s').'-'.$this->username.".php",'w');
    }


    public function create(){

        fwrite($this->fhandler,$this->text);
        fclose($this->fhandler);
    
    }


}


        // $id = $_SESSION['user_profile']->id;
        // $username = $_SESSION['user_profile']->username;
        // $profile = $_SESSION['user_profile']->profile_pic;
        // $comment = request('comment');
        // $date = date('Y-m-d-h-m-s').$username;

        // $path = 'users\santa\2023-03-28-11-03-37\comments\\';

        // $namefilecomment = str_replace('-','',$date);

        // $text = "<?php
        // return \$d$namefilecomment = [
        //         'idUsername' => '$id',
        //         'username' => '$username',
        //         'profilePic' => '$profile',
        //         'comment' => '$comment'
        // ];";

        // $fhandler = fopen($path.date('Y-m-d-h-m-s').$username.".php",'w');
        // fwrite($fhandler,$text);
        // fclose($fhandler);