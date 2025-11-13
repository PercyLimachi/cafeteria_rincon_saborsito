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
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id('id_reservacion');
            $table->foreignId('id_mesa')
                ->constrained('mesas', 'id_mesa')
                ->onDelete('restrict');
            $table->foreignId('id_cliente')
                ->nullable()
                ->constrained('clientes', 'id_cliente')
                ->onDelete('set null');
            $table->foreignId('id_usuario')
                ->nullable()
                ->constrained('usuarios', 'id_usuario')
                ->onDelete('set null');
            $table->string('nombre_cliente', 100); // Por si reserva sin estar registrado
            $table->string('telefono_cliente', 20); // Por si reserva sin estar registrado
            $table->string('email_cliente', 100)->nullable(); // Por si reserva sin estar registrado
            $table->timestamp('fecha_reservacion')->nullable();
            $table->timestamp('hora_reservacion')->nullable();
            $table->integer('numero_personas');
            $table->enum('estado', ['pendiente', 'confirmada', 'en_curso', 'completada', 'cancelada', 'no_asistio'])->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->timestampTz('fecha_creacion')->useCurrent();
            $table->timestampTz('fecha_actualizacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
