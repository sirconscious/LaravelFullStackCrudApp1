<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function show(){
        return view("loginPage");
    }
    public function login(Request $request){
        $email = $request->email ;
        $password = $request->password ;
        $values = ['email'=>$email , 'password'=>$password] ;
        if (Auth::attempt($values)) {
            $request->session()->regenerate();
            return redirect()->route('profiles.index')->with('success', 'You are now logged in.');
        }else{
            return back()->withErrors(['login_error' => 'Invalid email or password.']); 
        }
    }
    public function logout(){
        Session::flush() ;
        Auth::logout();
        return redirect()->route('profiles.index')->with('success', 'You are now logged out.');
    }
}
