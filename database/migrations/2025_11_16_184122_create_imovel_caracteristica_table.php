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
       Schema::create('imovel_caracteristica', function (Blueprint $table) {
            
            // Chaves primárias compostas
            $table->foreignId('imovel_id')->constrained('imoveis')->onDelete('cascade');
            $table->foreignId('caracteristica_id')->constrained('caracteristicas')->onDelete('cascade');
            
            // Define a chave primária composta
            $table->primary(['imovel_id', 'caracteristica_id']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imovel_caracteristica');
    }
};
