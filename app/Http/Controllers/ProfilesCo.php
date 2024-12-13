<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;

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
}
