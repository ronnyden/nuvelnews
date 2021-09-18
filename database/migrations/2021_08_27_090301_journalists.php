<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Journalists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journalist',function(Blueprint $table){
           $table->id();
           $table->timestamp("created_at");
           $table->string("name");
           $table->string("posts");
           $table->string("email");
           $table->string("password");
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("journalist");
    }
}
