<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioAvaliacao;

class FormularioAvaliacaoController extends Controller
{
    public function index()
    {
        $formularios = FormularioAvaliacao::all();
        return view('formularios-avaliacao.index', compact('formularios'));
    }

    public function create()
    {
        return view('formularios-avaliacao.create');
    }

    public function store(Request $request)
    {
        $formularioAvaliacao = new FormularioAvaliacao();
        $formularioAvaliacao->descricao = $request->descricao;
        $formularioAvaliacao->save();
        return redirect('/formularios-avaliacao')->with('success', 'Formulário de avaliação criado com sucesso.');
    }

    public function show($id)
    {
        $formulario = FormularioAvaliacao::findOrFail($id);
        return view('formularios-avaliacao.show', compact('formulario'));
    }

    public function edit($id)
    {
        $formulario = FormularioAvaliacao::findOrFail($id);
        return view('formularios-avaliacao.edit', compact('formulario'));
    }

    public function update(Request $request, $id)
    {
        $formularioAvaliacao = FormularioAvaliacao::findOrFail($id);
        $formularioAvaliacao->update($request->all());
        return redirect('/formularios-avaliacao')->with('success', 'Formulário de avaliação atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $formularioAvaliacao = FormularioAvaliacao::findOrFail($id);
        $formularioAvaliacao->delete();
        return redirect('/formularios-avaliacao')->with('success', 'Formulário de avaliação removido com sucesso.');
    }
}
