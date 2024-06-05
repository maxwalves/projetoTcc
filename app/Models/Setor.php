<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Setor extends Model
{
    use HasFactory;

    // Defina a tabela associada ao model
    protected $table = 'setores';

    // Defina os atributos que podem ser atribuídos em massa
    protected $fillable = ['nomeSetor'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function mensagens()
    {
        return $this->hasMany(Mensagem::class);
    }
}
