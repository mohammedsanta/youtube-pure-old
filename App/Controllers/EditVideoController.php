<?php
namespace App\Controllers;

use App\Models\videos_details;

class EditVideoController
{

    public function viewEditVideo()
    {

        $url = $_SERVER['REQUEST_URI'];

        $url = substr($url,18);

        
        $data['video'] = videos_details::query("select * from videos join videos_details using(id,username,date,title) where url ='$url.mp4'")[0];
        
        view('video.viewEditVideo',$data);
    }


    
}