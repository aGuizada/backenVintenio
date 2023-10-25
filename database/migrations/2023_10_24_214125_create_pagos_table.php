<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
    {
       Schema::create('pagos', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('viaje_id');
    $table->decimal('monto', 10, 2);
    $table->enum('metodo_pago', ['Efectivo', 'QR']);
    $table->timestamps();

    $table->foreign('viaje_id')->references('id')->on('viajes');
});
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};
