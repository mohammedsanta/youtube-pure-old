<?php
namespace App\Controllers;

use App\Models\videos;
use App\Models\videos_details;


class ProfileController
{

    public function profileView()
    {

        $data['videos'] = videos_details::query("select * from videos join videos_details using (id,username) where username = 'santa'");

        view('profile.index',$data);
    }
    
}
