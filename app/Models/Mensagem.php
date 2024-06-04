<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagens'; // O nome da tabela no banco de dados

    protected $fillable = ['nome', 'email', 'projeto', 'conteudo', 'dataCriacao']; // Campos que podem ser preenchidos em massa

    // Outros métodos, relações, etc., conforme necessário
}
