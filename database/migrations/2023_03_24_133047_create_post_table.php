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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable()->default("texto");
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('description')->nullable()->default("texto");
            $table->enum('status',['post','not_post'])->default("not_post");
            $table->timestamps();
             //Referencia de la clave foranea.
             $table->foreign('category_id')->references('id')->on('categories');
            
        });
       
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
