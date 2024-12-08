<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//route for homePage
Route::get('/home',[homeController::class,'index'])->name('home.index') ;