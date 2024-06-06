<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoCliente extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'cliente_id', 'formulario_avaliacao_id', 'status', 'hash'];

    // Definir as relações com Cliente e FormularioAvaliacao
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function formularioAvaliacao()
    {
        return $this->belongsTo(FormularioAvaliacao::class);
    }
}
