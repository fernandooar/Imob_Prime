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
      Schema::create('usuarios', function (Blueprint $table) {
        $table->id();
        $table->string('nome', 255)->nullable(false);
        $table->string('email', 255)->unique()->nullable(false);
        $table->string('senha', 255)->nullable(false);

        $table->foreignId('tipo_usuario_id')->constrained('tipos_usuario');
        
        $table->string('telefone1', 20)->nullable(false);
        $table->boolean('eh_whatsapp1')->default(false);
        $table->string('telefone2', 20)->nullable();
        $table->boolean('eh_whatsapp2')->default(false);
        
        $table->foreignId('endereco_id')->nullable()->constrained('endereco');

        $table->string('cpf', 14)->unique()->nullable();
        $table->string('rg', 20)->nullable();
        $table->string('creci', 50)->nullable();
        $table->string('cargo', 100)->nullable();
        $table->string('foto_url', 255)->nullable();
        $table->string('matricula', 20)->unique()->nullable();
        
        $table->foreignId('imobiliaria_id')->nullable()->constrained('imobiliarias');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
