<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagens'; // O nome da tabela no banco de dados

    protected $fillable = ['nome', 'email', 'assunto', 'conteudo', 'dataCriacao', 'setor_id']; // Campos que podem ser preenchidos em massa

    // Outros métodos, relações, etc., conforme necessário

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}
