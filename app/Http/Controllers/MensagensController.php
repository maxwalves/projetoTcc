<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensagem;
use App\Models\Setor;

class MensagensController extends Controller
{
    public function index()
    {
        $userAuth = auth()->user();
        $mensagens = Mensagem::all();
        
        $setores = Setor::all();

        $mensagens = $mensagens->filter(function ($mensagem) use ($userAuth) {
            return $mensagem->setor_id == $userAuth->setor_id;
        });
        
        return view('mensagens.index', compact('mensagens', 'setores'));
    }

    public function create()
    {
        return view('mensagens.create');
    }

    public function store(Request $request)
    {
        $mensagem = new Mensagem();
        $mensagem->nome = $request->nome;
        $mensagem->email = $request->email;
        $mensagem->assunto = $request->assunto;
        $mensagem->conteudo = $request->conteudo;
        
        $dataCriacao = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
        $mensagem->dataCriacao = $dataCriacao->format('Y-m-d H:i:s');
        $mensagem->save();
        
        return redirect('/mensagens')->with('success', 'Mensagem criada com sucesso.');
    }

    public function storeInicial(Request $request)
    {
        $mensagem = new Mensagem();
        $mensagem->nome = $request->nome;
        $mensagem->email = $request->email;
        $mensagem->assunto = $request->assunto;
        $mensagem->conteudo = $request->conteudo;
        $mensagem->setor_id = $request->setor;
        
        $dataCriacao = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
        $mensagem->dataCriacao = $dataCriacao->format('Y-m-d H:i:s');
        $mensagem->save();
        
        return "Sucesso";
    }

    public function show($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        return view('mensagens.show', compact('mensagem'));
    }

    public function edit($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        return view('mensagens.edit', compact('mensagem'));
    }

    public function update(Request $request, $id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->update($request->all());
        return redirect('/mensagens')->with('success', 'Mensagem atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete();
        return redirect('/mensagens')->with('success', 'Mensagem removida com sucesso.');
    }
}
