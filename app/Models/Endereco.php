<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Endereco extends Model
{
    /** @use HasFactory<\Database\Factories\EnderecoFactory> */
    use HasFactory;
    protected $table = 'endereco'; // Define o nome da tabela no banco de dados

    /**
     * Relacionamento: endereco possui muitas imobiliarias
     */
    public function imobiliaria(): HasOneOrMany
    {
        return $this->hasMany(Imobiliaria::class, 'endereco_id', 'id');
    }

    /**
     * Relacionamento: endereco possui muitos usuarios
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'endereco_id', 'id');
    }

    /**
     * Relacionamento: endereco possui muitos imoveis
     */
    public function imoveis(): HasMany
    {
        return $this->hasMany(Imovel::class, 'endereco_id', 'id');
    }
    
}
