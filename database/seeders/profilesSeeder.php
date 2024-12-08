<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class profilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table("profiles")->insert([
            "name"=>Str::random(10) ,
            "email"=>Str::random(10)."@gmail.com" ,
            "password"=>Hash::make('password'),
            "bio"=>Str::random(120)

        ]) ;

    }
}
