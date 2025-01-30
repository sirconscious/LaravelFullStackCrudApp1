<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;

class PublicationController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth')->except(["index"]) ;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $publications =  Publication::latest()->get() ;
        return view("publications.index" ,compact("publications")) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("publications.create") ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {

        $formFileds = $request->validated();
        // dd(Auth::id()) ;
        $formFileds["profiles_id"] = Auth::id() ;
        // dd($formFileds["profiles_id"]) ;
        unset($formFileds["image"]) ;
        if ($request->hasFile("image")) {
            $formFileds["image"] = $request->file("image")->store("publication",'public'); 
        }
          Publication::create($formFileds);
        return to_route("publications.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //checking authorization for edit action
        // if(Gate::allows("upadte-publication", $publication)){
        //     return view("publications.edit",compact("publication"));

        // }else{
        //     //display a authorization error
        //     return abort(403);
        // }   
        // Gate::allowIf(Auth::id() == $publication->profiles_id) ;
        // Gate::denyIf(Auth::id() !== $publication->profiles_id) ;
        //same as above

        Gate::authorize("upadte-publication", $publication); 
        return view("publications.edit",compact("publication"));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $formFileds = $request->validated();
        unset($formFileds["image"]) ;
        if ($request->hasFile("image")) {
            $formFileds["image"] = $request->file("image")->store("publication",'public'); 
        }  
        $isUpdated = $publication->fill($formFileds)->save();
        return  to_route("publications.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route("publications.index");
    }
}
