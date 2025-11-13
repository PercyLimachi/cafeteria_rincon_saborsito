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
        Schema::create('pedidos', function (Blueprint $table) {
             $table->id('id_pedido');
            $table->string('numero_pedido', 20)->unique();
            $table->foreignId('id_cliente')
                ->nullable()
                ->constrained('clientes', 'id_cliente')
                ->onDelete('set null');
            $table->foreignId('id_mesa')
                ->nullable()
                ->constrained('mesas', 'id_mesa')
                ->onDelete('set null');
            $table->foreignId('id_reservacion')
                ->nullable()
                ->constrained('reservaciones', 'id_reservacion')
                ->onDelete('set null');
            $table->enum('tipo_pedido', ['local', 'online'])->default('local');
            $table->enum('estado', ['pendiente', 'confirmado', 'en_preparacion', 'entregado', 'cancelado'])->default('pendiente');
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->enum('estado_pago', ['pendiente', 'pagado', 'cancelado'])->default('pendiente');
            $table->timestamp('fecha_pedido')->useCurrent();
            $table->timestamp('fecha_entrega')->nullable();
            $table->timestampTz('fecha_actualizacion')->nullable();
            $table->text('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
