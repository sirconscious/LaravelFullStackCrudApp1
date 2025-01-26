<?php

use App\Http\Controllers\create;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileId;
use App\Http\Controllers\ProfilesCo;
use App\Http\Controllers\PublicationController;
use App\Models\Publication;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
// //route for profiles
Route::get('/profiles',[ProfilesCo::class,'index'])->name('profiles.index');
//route for homePage
Route::get('/home',[homeController::class,'index'])->name('home.index')->middleware("auth") ;

//grouping the routes  ==>
   // Routes for profile
   Route::name('profile.')->group(function(){   
        //grouping the controller
        Route::controller(ProfilesCo::class)->group(function(){
           
            //route for delete
            Route::delete('/profile/{profile}', 'delete')->name('delete');
            //routes to update a profile ==>
            //Route for the view 
            Route::get('/profile/{profile}/edit', 'edit')->name('edit');
            //Route to update 
            Route::put('profile/{profile}' ,  'update')->name('update') ;
        });
          //route to get more details about a profile
          Route::get('/profile/{profile:id}',[profileId::class,'index'])->name('index');
       
    }); ;
    //end of grouping the profiles routes 
        // Route::resource("profile",ProfilesCo::class) ;
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
    Route::name("login")->group(function(){
        Route::controller(loginController::class)->group(function(){
            Route::middleware("guest")->group(function(){
                 //route for login form
            Route::get('/login', "show");
            Route::post('/login',"login")->name('.login');
            }) ;
            //route for logoute
            Route::get('/logout','logout')->name('.logout');
        }) ;
    });
// //cookies 
// Route::get('/cookie/set/{cookie}', function ($cookie) {
//     $cookieObject = cookie('age', $cookie, 5); // 'age' is the name, $cookie is the value, 5 is the duration in minutes
//     return response('Cookie set successfully!')->cookie($cookieObject);
// });
Route::get('/cookie/set/{cookie}', function ($cookie) {
    $response =  new Response("Cookie set successfully !",200) ;
    
    $cookieObject = cookie()->forever('name', $cookie);//400  // 'age' is the name, $cookie is the value, 5 is the duration in minutes
    return $response->withCookie($cookieObject);
});

Route::get('cookie/get', function(Request $request){
    return dd($request->cookie("name"));
});
//headers 
Route::get('/headers', function (Request $request) {
    $response =  new Response([
        "data" => "ok"
    ]) ;
    dd($request->header("host")) ;
    return $response->withHeaders([
        "Content-Type"=>"Application/json",
        "X-Mehdi" => "Nice" 
    ]);
});
//request
Route::get("/request", function(Request $request){
    // dd($request->url() , $request->fullUrl()) ;
    // dd($request->path()) ;
    // dd($request->is("request")) ;
    // dd($request->host()) ;
    //  dd($request->method()) ;
    //  dd($request->isMethod("GET")) ;
    dd($request->ip()) ;
}) ;

//publications 
Route::resource("publications" , PublicationController::class);
