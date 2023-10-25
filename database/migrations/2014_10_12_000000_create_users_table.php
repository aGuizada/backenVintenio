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
        Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('nombre', 100);
    $table->string('email', 100)->unique();
    $table->string('password');
    $table->string('numero_telefono', 20);
    $table->unsignedBigInteger('rol_id');
    $table->foreign('rol_id')->references('id')->on('roles');
    $table->decimal('ubicacion_latitud', 9, 6)->nullable();
    $table->decimal('ubicacion_longitud', 9, 6)->nullable();
    $table->boolean('disponible')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
