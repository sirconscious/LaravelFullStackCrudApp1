<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class create extends Controller
{
    public function index(){
        return view('createPage');
    }
    
    public function add(Request $request){
        // dd($request->file('image'));

        //form validation
        $formFileds = $request->validate([
            "name" => 'required|string|min:5|max:20',
            "email" => 'required|email|unique:profiles',
            "password" => 'required|string|min:5|max:30|confirmed',
            "bio" => 'required|string',
            'image' => 'required|image|mimes:png,svg,jpg,jpeg|max:10240',


        ]);
        //storing the image
        $formFileds["image"] = $request->file("image")->store("profile",'public');
        //password Hashing
        $formFileds["password"] = Hash::make($formFileds["password"]);
        //profile creating
        Profiles::create($formFileds);
        //ading the flashbag when a profile is added succesfuly
        return redirect()->route('profiles.index')->with('success','the profile is added with succes');
    }
}

