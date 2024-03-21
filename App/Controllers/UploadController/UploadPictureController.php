<?php
namespace App\Controllers\UploadController;

class UploadPictureController
{

    public  $namefile;
    public  $tmp_name;
    public  $size;

    public $picture;

    public function __construct($random)
    {
        $this->namefile = $_FILES['PictureVideo']['name'];
        $this->tmp_name = $_FILES['PictureVideo']['tmp_name'];
        $this->size = $_FILES['PictureVideo']['size'];

        $this->namefile = explode('.',$this->namefile);
        array_shift($this->namefile);

        $this->picture = $random.'.'.$this->namefile[0];
    }

    public function upload($path)
    {
        return  move_uploaded_file($this->tmp_name,$path);
    }

}