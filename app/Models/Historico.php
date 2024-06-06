<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'cliente_id', 'tipoRegistro', 'anexo', 'descricao'];

    // Definir a relação com Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
