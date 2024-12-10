<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function show(){
        return view("loginPage");
    }
    public function login(Request $request){
        $email = $request->email ;
        $password = $request->password ;
        $values = ['email'=>$email , 'password'=>$password] ;
        dd(Auth::attempt($values)) ;
    }
}
