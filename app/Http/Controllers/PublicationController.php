<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
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
