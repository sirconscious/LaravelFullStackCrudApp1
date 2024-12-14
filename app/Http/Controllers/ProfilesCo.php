<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilesCo extends Controller
{
    public function index(){
        $profiles = Profiles::paginate(12);
        // dd($profiles);
        return view('profilesPage',compact('profiles')) ;
    }
    public function delete(Profiles $profile){
        $profile->delete();
        return back();
    }
    public function edit(Profiles $profile){
        return view('editPage',compact('profile')) ;
    }
    public function update(Profiles $profile , Request $request){
        $formFileds = $request->validate([
            "name" => 'required|string|min:5|max:20',
            "email" => 'required|email',
            "password" => 'required|string|min:5|max:30|confirmed',
            "bio" => 'required|string'
        ]);
        $formFileds["password"] = Hash::make($formFileds["password"]);
        // to update in db 
         $profile->fill($formFileds)->save() ;
         //redirect to index
        //  dd($profile);
         return redirect()->route('profiles.index')->with('success','the profile is updated with succes');

    }
}
