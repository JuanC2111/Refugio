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
        Schema::create('solicitudes_padrinaje', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('perro_id')->constrained('perros')->onDelete('cascade');
            $table->enum('tipo_padrinaje', ['corporativo', 'universitario', 'fin_de_semana']);
            $table->string('dias_paseo', 100)->nullable(); // ej: "Sábados y Domingos"
            $table->boolean('acepta_compromiso')->default(false); // del formulario de compromiso
            $table->text('comentario_adicional')->nullable();
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes_padrinaje');
    }
};
