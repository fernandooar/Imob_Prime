<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /** @use HasFactory<\Database\Factories\UsuarioFactory> */
    use HasFactory;

    protected $table = 'usuarios'; // Define o nome da tabela no banco de dados

    // Configurações adicionais do modelo podem ser adicionadas aqui


    /**
     * Relacionamento: usuario pertence a um endereco
     */
    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'endereco_id', 'id');
    }

    /**
     * Relationamento: Usuário Pertence a um Tipo de Usuário (Define o papel do usuário)
     */
    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id', 'id');
    }

    /**
     * Relacionamento: Usuário (Funcionário) pertence a uma Imobiliária (Opcional)
     */
    public function imobiliaria(): BelongsTo
    {
        return $this->belongsTo(Imobiliaria::class, 'imobiliaria_id', 'id');
    }
}
