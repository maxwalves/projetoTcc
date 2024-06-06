<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campo;
use App\Models\FormularioAvaliacao;

class CampoController extends Controller
{
    public function index()
    {
        $campos = Campo::all();
        return view('campos.index', compact('campos'));
    }

    public function create()
    {
        $formularios = FormularioAvaliacao::all();
        return view('campos.create', compact('formularios'));
    }

    public function store(Request $request)
    {
        $campo = new Campo();
        $campo->pergunta = $request->pergunta;
        $campo->formularioAvaliacao()->associate($request->formulario_avaliacao_id);
        $campo->save();
        return redirect('/campos')->with('success', 'Campo criado com sucesso.');
    }

    public function show($id)
    {
        $campo = Campo::findOrFail($id);
        return view('campos.show', compact('campo'));
    }

    public function edit($id)
    {
        $campo = Campo::findOrFail($id);
        $formularios = FormularioAvaliacao::all();
        return view('campos.edit', compact('campo', 'formularios'));
    }

    public function update(Request $request, $id)
    {
        $campo = Campo::findOrFail($id);
        $campo->update([
            'pergunta' => $request->pergunta,
            'formulario_avaliacao_id' => $request->formulario_avaliacao_id,
        ]);
        return redirect('/campos')->with('success', 'Campo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $campo = Campo::findOrFail($id);
        $campo->delete();
        return redirect('/campos')->with('success', 'Campo removido com sucesso.');
    }
}
