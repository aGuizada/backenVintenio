<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('usuario_id');
    $table->unsignedBigInteger('conductor_id');
    $table->dateTime('fecha_hora_solicitud');
    $table->decimal('origen_latitud', 9, 6);
    $table->decimal('origen_longitud', 9, 6);
    $table->decimal('destino_latitud', 9, 6);
    $table->decimal('destino_longitud', 9, 6);
    $table->enum('estado_viaje', ['Solicitado', 'Aceptado', 'Completado', 'Cancelado']);
    $table->decimal('costo', 10, 2);
    $table->enum('metodo_pago', ['Efectivo', 'QR']);
    $table->timestamps();

    $table->foreign('usuario_id')->references('id')->on('users');
    $table->foreign('conductor_id')->references('id')->on('users');
});

    }

    public function down()
    {
        Schema::dropIfExists('viajes');
    }
};
