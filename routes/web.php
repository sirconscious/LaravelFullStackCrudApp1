<?php

use App\Http\Controllers\create;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileId;
use App\Http\Controllers\ProfilesCo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//route for profiles
Route::get('/profiles',[ProfilesCo::class,'index'])->name('profiles.index');
//route for homePage
Route::get('/home',[homeController::class,'index'])->name('home.index') ;

//grouping the routes  ==>
    //Routes for profile
    Route::name('profile.')->group(function(){   
        //grouping the controller
        Route::controller(ProfilesCo::class)->group(function(){
             //route to get more details about a profile
            Route::get('/profile/{profile:id}','index')->name('index');
            //route for delete
            Route::delete('/profile/{profile}', 'delete')->name('delete');
            //routes to update a profile ==>
            //Route for the view 
            Route::get('/profile/{profile}/edit', 'edit')->name('edit');
            //Route to update 
            Route::put('profile/{profile}' ,  'update')->name('update') ;
        });
       
    }); ;
    //end of grouping the profiles routes 

//Routes for to create a profile
    Route::name("create.")->group(function(){
        Route::controller(create::class)->group(function(){
            //route for the form to create a profile 
            Route::get('/create','index')->name('index');
            //route to add profile to db 
            Route::post('/add','add')->name('add');
        }) ;
    }) ;
    //end of grouping the create routes

//routes for the login 
    Route::name("login.")->group(function(){
        Route::controller(loginController::class)->group(function(){
            //route for login form
            Route::get('/login', "show")->name('show');
            Route::post('/login',"login")->name('login');
            //route for logoute
            Route::get('/logout','logout')->name('logout');
        }) ;
    });
    
