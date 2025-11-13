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
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id('id_detalle_pedido');
            $table->foreignId('id_pedido')
                ->constrained('pedidos', 'id_pedido')
                ->onDelete('cascade');
            $table->foreignId('id_producto')
                ->constrained('productos', 'id_producto')
                ->onDelete('restrict');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('subtotal', 10, 2);
            $table->text('observaciones')->nullable(); // Ej: "Sin cebolla", "Término medio"
            $table->enum('estado', ['pendiente', 'en_preparacion', 'entregado'])->default('pendiente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
    }
};
