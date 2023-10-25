<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
       Schema::create('resenas', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('usuario_id');
    $table->unsignedBigInteger('conductor_id');
    $table->integer('calificacion');
    $table->text('comentario');
    $table->timestamps();

    $table->foreign('usuario_id')->references('id')->on('users');
    $table->foreign('conductor_id')->references('id')->on('users');
});

    }

    public function down()
    {
        Schema::dropIfExists('resenas');
    }
};
