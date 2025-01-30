<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profiles;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileControlelr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
    
        return Profiles::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFileds = $request->all()  ;
        // return response()->json($formFileds) ;
        $formFileds["password"] = Hash::make($formFileds["password"]);
        Profiles::create($formFileds);
        return response()->json($formFileds) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Profiles $profile ,Request $request)
    {   

        return  $profile;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profiles $profile)
    {
        $formFileds = $request->all()  ;
        $formFileds["password"] = Hash::make($formFileds["password"]);
        $profile->fill($formFileds)->save() ;
      return   response()->json($formFileds) ;
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profiles $profile)
    {
        $profile->delete() ; 
        return response()->json("deleted")  ;
    }
}
