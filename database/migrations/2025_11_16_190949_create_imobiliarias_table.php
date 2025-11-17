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
        Schema::create('imobiliarias', function (Blueprint $table) {
        $table->id();
        $table->string('nome_fantasia', 255)->nullable(false);
        $table->string('razao_social', 255)->nullable();
        $table->string('cnpj', 18)->unique()->nullable();
        
        // FK: foreignId('coluna') -> constrained('tabela_referenciada')
        $table->foreignId('endereco_id')->constrained('endereco');
        
        $table->string('telefone', 20)->nullable();
        $table->string('email', 255)->nullable();
        $table->string('creci_pj', 50)->nullable();
        $table->string('logo_url', 255)->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imobiliarias');
    }
};
