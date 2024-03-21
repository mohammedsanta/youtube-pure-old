<?php
namespace App\Controllers\UploadController;

class Upload
{

    public UploadVideoController $videoManager;
    public UploadPictureController $pictureManager;

    public $user;
    public $random;

    public $path;

    public $video;
    public $picture;

    public $urlVideo;
    public $urlPicture;

    public function __construct()
    {

        $this->user = app()->session->profile('username');
        $this->random = random();
        $this->path = 'users/'.$this->user.'/'.$this->random.'/';

        $this->videoManager = new UploadVideoController($this->random);;
        $this->pictureManager = new UploadPictureController($this->random);

        $this->video = $this->videoManager->video;
        $this->picture = $this->pictureManager->picture;

        $this->urlVideo = $this->path.$this->video;
        $this->urlPicture = $this->path.$this->picture;
    }

    public function upload()
    {
        mkdir('users/'.$this->user.'/'.$this->random);
        mkdir($this->path.'comments');

        $this->videoManager->upload($this->urlVideo);
        $this->pictureManager->upload($this->urlPicture);
    }

}