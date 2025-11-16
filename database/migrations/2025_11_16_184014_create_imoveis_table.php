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
      Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            
            // FK para TiposImovel
            $table->foreignId('tipo_imovel_id')->constrained('tipos_imovel');
            
            $table->decimal('total_area', 10, 2)->nullable();
            $table->integer('comodos')->nullable();
            $table->boolean('possui_condominio')->default(false);
            $table->decimal('valor_taxa_condominio', 10, 2)->default(0.00);
            
            // Tipo de dado ENUM ainda é útil aqui para opções fixas de negócio
            $table->enum('disponibilidade', ['locacao', 'venda', 'indisponivel'])->nullable(false);
            
            $table->decimal('preco_venda', 10, 2)->nullable();
            $table->decimal('preco_locacao', 10, 2)->nullable();
            
            // FK para Endereco
            $table->foreignId('endereco_id')->constrained('endereco');

            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imoveis');
    }
};
