<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("post",function(Blueprint $table){
           $table->id();
           $table->timestamp("posted_at");
           $table->string("image")->nullable();
           $table->string("author");
           $table->string("title");
           $table->string("category");
           $table->string("article");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("post");
    }
}
