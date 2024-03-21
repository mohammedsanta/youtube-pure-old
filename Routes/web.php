<?php

use Santa\Http\Routes;
use App\Controllers\HomeController;
use App\Controllers\VideoController;
use App\Controllers\ProfileController;
use App\Controllers\EditVideoController;
use App\Controllers\Auth\LoginController;
use App\Controllers\VideoUploadContoller;
use App\Controllers\Auth\LogoutController;

Routes::get('/',[HomeController::class,'index']);

Routes::get('/login',[LoginController::class,'viewLogin']);
Routes::post('/login',[LoginController::class,'login']);
Routes::get('/logout',[LogoutController::class,'logout']);

Routes::get('/profile',[ProfileController::class,'profileView']);
Routes::get('/profile/edit',[EditVideoController::class,'viewEditVideo']);
// Routes::get('/profile/edit/',[EditVideoController::class,'viewEditVideo']);


Routes::get('/video',[VideoController::class,'viewVideo']);
Routes::get('/video/url/',[VideoController::class,'viewVideo']);

Routes::get('/watch',[VideoController::class,'viewVideo']);

Routes::post('/watch',[VideoController::class,'actions']);

Routes::get('/video/upload',[VideoUploadContoller::class,'videoUploadView']);
Routes::post('/video/upload',[VideoUploadContoller::class,'upload']);
