<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model

{
    use HasFactory , SoftDeletes;
    protected $date =["created_at"];
    protected $fillable = array(
        "title"  ,"body","image" , "profiles_id"
    ) ;
    public function profile(){
        return $this->belongsTo(Profiles::class, "profiles_id", "id");
    }
    }
