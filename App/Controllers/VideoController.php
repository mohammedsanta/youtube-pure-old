<?php
namespace App\Controllers;

use App\Models\videos;
use App\Controllers\Comment\GetComment;
use App\Controllers\Comment\WriteComment;

class VideoController
{

    public function viewVideo()
    {
        
        $url = $data['url'] = videos::where(['id_key','=',$_GET['v']]);
                
        $data['videos'] = videos::all();
        
        $comment = new GetComment($url);
        $data['get'] = $comment->get();

        view('video.viewVideo',$data);
    }

    public function actions()
    {

        $comment = new WriteComment(videos::where(['id_key','=',$_GET['v']]));

        $comment->create();

        return back();
    }
    
}