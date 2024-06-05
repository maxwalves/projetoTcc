<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $setores = Setor::all();
        return view('setores.index', compact('setores', 'user'));
    }

    public function create()
    {
        return view('setores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomeSetor' => 'required|string|max:255',
        ]);

        $setor = new Setor();
        $setor->nomeSetor = $request->nomeSetor;
        $setor->save();
        
        return redirect('/setores')->with('success', 'Setor criado com sucesso.');
    }

    public function show($id)
    {
        $setor = Setor::findOrFail($id);
        return view('setores.show', compact('setor'));
    }

    public function edit($id)
    {
        $setor = Setor::findOrFail($id);
        return view('setores.edit', compact('setor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomeSetor' => 'required|string|max:255',
        ]);

        $setor = Setor::findOrFail($id);
        $setor->update($request->all());
        return redirect('/setores')->with('success', 'Setor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $setor = Setor::findOrFail($id);
        $setor->delete();
        return redirect('/setores')->with('success', 'Setor removido com sucesso.');
    }
}
