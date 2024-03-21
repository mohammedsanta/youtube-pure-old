<?php
namespace App\Controllers\UploadController;

class UploadVideoController
{

    public  $namefile;
    public  $tmp_name;
    public  $size;


    public $video;

    public function __construct($random)
    {
        $this->namefile = $_FILES['Video']['name'];
        $this->tmp_name = $_FILES['Video']['tmp_name'];
        $this->size = $_FILES['Video']['size'];

        $this->namefile = explode('.',$this->namefile);
        array_shift($this->namefile);

        // $this->video = $random.'.'.$this->namefile[0];

        $this->video = rand(9,999999).'.mp4';
    }

    public function upload($path)
    {
        return  move_uploaded_file($this->tmp_name,$path);
    }

}