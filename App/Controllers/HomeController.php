<?php
namespace App\Controllers;

use App\Models\videos;

class HomeController
{

    public function index()
    {

        $data['videos'] = videos::all();
        
        view('home.index',$data);
    }
    
}
