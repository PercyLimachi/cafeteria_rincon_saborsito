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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id('id_inventario');
            $table->foreignId('id_producto')
                ->constrained('productos', 'id_producto')
                ->onDelete('cascade');
            $table->integer('cantidad');
            $table->integer('stock_anterior');
            $table->integer('stock_nuevo');
            $table->string('motivo', 200);
            $table->foreignId('id_usuario')
                ->nullable()
                ->constrained('usuarios', 'id_usuario')
                ->onDelete('set null');
            $table->text('observaciones')->nullable();
            $table->timestampTz('fecha_movimiento')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
