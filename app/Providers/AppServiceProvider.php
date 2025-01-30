<?php

namespace App\Providers;

use App\Models\Profiles;
use App\Models\Publication;
use App\Policies\PublicationPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
// use App\Models\Order;
// use App\Policies\OrderPolicy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
     {
    //     Gate::define("upadte-publication", function(GenericUser $profiles, Publication $publication){
    //         //check if the user is the owner
    //         if ( $profiles->id == $publication->profiles_id ) {
    //             //allow the resuest
    //             return Response::allow();
    //         }else{
    //             //deny the request and display a message 
    //             return Response::deny("You can't update this publication");
    //         }
    //     }) ;
       Gate::policy(Publication::class, PublicationPolicy::class)  ;

    }
    // public function before(User $user, string $ability ) {
    //  
    // }
}