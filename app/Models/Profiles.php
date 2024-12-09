<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Profiles extends Model
{
    use HasFactory;
    protected $fillable = array(
        "name" , "email" ,"bio" , "password"
    ) ;
}
