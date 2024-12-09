<?php

use App\Http\Controllers\create;
use App\Http\Controllers\homeController;
use App\Http\Controllers\profileId;
use App\Http\Controllers\ProfilesCo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//route for homePage
Route::get('/home',[homeController::class,'index'])->name('home.index') ;
//route for profiles
Route::get('/profiles',[ProfilesCo::class,'index'])->name('profiles.index');
//route to get more details about a profile
Route::get('/profile/{profile:id}',[profileId::class , 'index'])->name('profile.index');
//route for the form to create a profile 
Route::get('/create',[create::class,'index'])->name('create.index');