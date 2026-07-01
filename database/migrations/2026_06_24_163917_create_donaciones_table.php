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
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // nullable: puede donar un visitante sin cuenta
            $table->decimal('monto', 8, 2);
            $table->string('nombre_donante', 100)->nullable(); // por si dona sin estar registrado
            $table->string('correo_donante', 100)->nullable();
            $table->enum('estado', ['pendiente', 'completada', 'fallida'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};
