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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->foreignId('id_persona')
                ->constrained('personas', 'id_persona')
                ->onDelete('cascade');
            $table->string('estado', 20);
            $table->timestamp('fecha_reservacion')->nullable();
            $table->timestamp('hora_reservacion')->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->useCurrent()->useCurrentOnUpdate();



            /*$table->id('id_cliente');
            
            $table->decimal('deuda_actual', 10, 2)->default(0);
            $table->string('tipo_cliente', 20)->default('Regular'); // Regular, VIP, Mayorista
            $table->integer('puntos_fidelidad')->default(0);
            $table->boolean('estado')->default(true);
            $table->timestampTz('fecha_creacion')->useCurrent();
            
            $table->unique('id_persona');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};