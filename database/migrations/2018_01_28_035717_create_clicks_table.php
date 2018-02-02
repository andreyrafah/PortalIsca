<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClicksTable extends Migration
{
   
    public function up()
    {
        Schema::create('clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('link_id')->unsigned();
            $table->foreign('link_id')->references('id')->on('links');
            $table->string('origem');
            $table->string('ip')->default('');
            $table->string('hostname')->default('');
            $table->string('cidade')->default('');
            $table->string('uf')->default('');
            $table->string('pais')->default('');
            $table->string('coordenadas')->default('');
            $table->string('navegador')->default('');
            $table->string('SO')->default('');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('clicks');
    }
}
