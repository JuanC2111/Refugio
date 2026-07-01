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
        Schema::create('perros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->integer('edad'); // en años
            $table->text('historia'); // historia/descripción de rescate
            $table->text('necesidades_especiales')->nullable(); // discapacidad/condición
            $table->string('foto')->nullable(); // ruta de la imagen
            $table->enum('estado', ['disponible', 'apadrinado', 'no_disponible'])->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perros');
    }
};
