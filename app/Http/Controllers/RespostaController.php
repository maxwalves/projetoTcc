<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resposta;
use App\Models\Campo;
use App\Models\AvaliacaoCliente;

class RespostaController extends Controller
{
    public function index()
    {
        $respostas = Resposta::all();
        return view('respostas.index', compact('respostas'));
    }

    public function create()
    {
        $campos = Campo::all();
        $avaliacoes = AvaliacaoCliente::all();
        return view('respostas.create', compact('campos', 'avaliacoes'));
    }

    public function store(Request $request)
    {
        $resposta = new Resposta();
        $resposta->data = $request->data;
        $resposta->resposta = $request->resposta;
        $resposta->campo()->associate($request->campo_id);
        $resposta->avaliacaoCliente()->associate($request->avaliacao_cliente_id);
        $resposta->save();
        return redirect('/respostas')->with('success', 'Resposta criada com sucesso.');
    }

    public function show($id)
    {
        $resposta = Resposta::findOrFail($id);
        return view('respostas.show', compact('resposta'));
    }

    public function edit($id)
    {
        $resposta = Resposta::findOrFail($id);
        $campos = Campo::all();
        $avaliacoes = AvaliacaoCliente::all();
        return view('respostas.edit', compact('resposta', 'campos', 'avaliacoes'));
    }

    public function update(Request $request, $id)
    {
        $resposta = Resposta::findOrFail($id);
        $resposta->update([
            'data' => $request->data,
            'resposta' => $request->resposta,
            'campo_id' => $request->campo_id,
            'avaliacao_cliente_id' => $request->avaliacao_cliente_id,
        ]);
        return redirect('/respostas')->with('success', 'Resposta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $resposta = Resposta::findOrFail($id);
        $resposta->delete();
        return redirect('/respostas')->with('success', 'Resposta removida com sucesso.');
    }
}
