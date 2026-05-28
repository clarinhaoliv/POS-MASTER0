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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fornecedor_id')
                  ->constrained('fornecedores')
                  ->cascadeOnDelete();
            $table->string('nome');
            $table->decimal('preco', 8, 2)->default(0.00);
            $table->integer('quantidade')->default(0);
            $table->integer('estoque_minimo')->default(5);
            $table->string('cor');
            $table->string('material');
            $table->enum('garantia_estendida', ['sim', 'não']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
