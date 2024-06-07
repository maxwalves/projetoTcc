<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioAvaliacao extends Model
{
    use HasFactory;
    
    protected $table = 'formulario_avaliacoes';

    protected $fillable = ['descricao'];

    // Relação com Campo
    public function campos()
    {
        return $this->hasMany(Campo::class);
    }
}
