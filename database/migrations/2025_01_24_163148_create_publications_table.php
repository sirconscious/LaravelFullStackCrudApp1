<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string("title" ,150 ) ;
            $table->text("body") ; 
            $table->string("image")->nullable() ; 
            $table->unsignedBigInteger("profiles_id")  ;  // Here i Changed the data type to match the 'id' column in 'profiles' table
            $table->foreign("profiles_id")->references("id")->on("profiles") ;
            $table->softDeletes() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
