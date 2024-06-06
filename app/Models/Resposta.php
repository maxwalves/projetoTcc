<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'campo_id', 'avaliacao_cliente_id', 'resposta'];

    // Relações
    public function campo()
    {
        return $this->belongsTo(Campo::class);
    }

    public function avaliacaoCliente()
    {
        return $this->belongsTo(AvaliacaoCliente::class);
    }
}
