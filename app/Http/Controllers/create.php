<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class create extends Controller
{
    public function index(){
        return view('createPage');
    }
    public function add(Request $request){
        $name = $request->name ;
        $email = $request->email ;
        $password = $request->password ;
        $bio = $request->bio;
        Profiles::create([
            'name'=> $name ,
            'email'=>$email ,
            'password'=>$password ,
            'bio'=>$bio
        ]);
       return redirect()->route('profiles.index');
    }
}
