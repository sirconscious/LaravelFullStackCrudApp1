<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profiles extends Model
{
    use HasFactory;
    use SoftDeletes ;
    protected $date =["created_at"];
    protected $fillable = array(
        "name" , "email" ,"bio" , "password" ,"image"
    ) ;
    public function publications(){
       return  $this->hasMany(Publication::class);
    }

}