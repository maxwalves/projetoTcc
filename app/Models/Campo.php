<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    use HasFactory;

    protected $fillable = ['pergunta', 'formulario_avaliacao_id'];

    // Relação com FormularioAvaliacao
    public function formularioAvaliacao()
    {
        return $this->belongsTo(FormularioAvaliacao::class);
    }
}
