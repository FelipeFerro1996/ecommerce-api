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
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->double('preco_unitario', 10, 2);
            $table->foreignId('pedido_id')
                ->references('id')
                ->on('pedidos');
            $table->foreignId('produto_id')
                ->references('id')
                ->on('produtos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_produtos');
    }
};
