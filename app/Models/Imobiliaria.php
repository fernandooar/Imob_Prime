<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Imobiliaria extends Model
{
    /** @use HasFactory<\Database\Factories\ImobiliariaFactory> */
    use HasFactory;
    protected $table = 'imobiliarias'; // Define o nome da tabela no banco de dados

    /**
     * Relacionamento: imobiliaria pertence a um endereco
     */
    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'endereco_id', 'id');

    }

    /**
     * Relacionamento: imobiliaria possui muitos usuarios (Cliente, funcionarios)
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'imobiliaria_id', 'id');
    }

    
}
