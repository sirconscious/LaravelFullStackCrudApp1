<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;

class profileId extends Controller
{
    public function index(Profiles $profile){
        $prof = $profile ;
        return view('profileInfo' , compact("prof"));
    }
}
