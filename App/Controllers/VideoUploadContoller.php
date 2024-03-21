<?php
namespace App\Controllers;

use App\Models\videos;
use Santa\Validation\Validator;
use App\Controllers\UploadVideoController;
use App\Controllers\UploadController\Upload;

class VideoUploadContoller
{

    public function videoUploadView()
    {
        view('video.VideoCreate');
    }
    

    public function upload()
    {

        $v = new Validator;

        $v->setRules([
            'Title'     => 'required|between:3,50',
            'Video'     => 'required|between:3,50',
        ]);

        $v->make(request()->all());

        if(!$v->passes()){
            app()->session->setFlash('errors',$v->errors());
            app()->session->setFlash('old',request()->all());

            return back();
        }
        
        $upload = new Upload;
        $upload->upload();

        // dump($upload);

        videos::create([
            'id_key' => $upload->random,
            'title' => request('Title'),
            'url' => $upload->urlVideo,
            'UrlPic' => $upload->urlPicture,
            'date' => date('Y-m-d'),
            'username' => $_SESSION['user_profile']->username
        ]);

        app()->session->setFlash('success','Upload Complyted');



        return back();
    }

}
