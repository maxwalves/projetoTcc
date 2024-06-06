<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['nome', 'email', 'telefone', 'dataCriacao', 'setor_id', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }

    public function avaliacoes()
    {
        return $this->hasMany(AvaliacaoCliente::class);
    }
}
