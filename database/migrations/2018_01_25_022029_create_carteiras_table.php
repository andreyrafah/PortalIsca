<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarteirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteiras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('mensagem');
            $table->integer('codigo');
            $table->string('url');
            $table->integer('fila');
            $table->string('email');
            $table->string('sms');
            $table->string('Whatsapp');
            $table->string('telefone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carteiras');
    }
}
