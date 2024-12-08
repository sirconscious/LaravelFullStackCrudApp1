<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesCo extends Controller
{
    public function index(){
        return view('profilesPage') ;
    }
}
