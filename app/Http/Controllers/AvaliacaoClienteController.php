<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvaliacaoCliente;
use App\Models\Cliente;
use App\Models\FormularioAvaliacao;

class AvaliacaoClienteController extends Controller
{
    public function index()
    {
        $avaliacoes = AvaliacaoCliente::all();
        return view('avaliacoes-cliente.index', compact('avaliacoes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $formularios = FormularioAvaliacao::all();
        return view('avaliacoes-cliente.create', compact('clientes', 'formularios'));
    }

    public function store(Request $request)
    {
        $avaliacao = new AvaliacaoCliente();
        //faça para os seguintes atributos: 'data', 'cliente_id', 'formulario_avaliacao_id', 'status', 'hash'
        $avaliacao->data = $request->data;
        $avaliacao->cliente_id = $request->cliente_id;
        $avaliacao->formulario_avaliacao_id = $request->formulario_avaliacao_id;
        $avaliacao->status = $request->status;
        $avaliacao->hash = md5(uniqid());

        $avaliacao->save();
        return redirect('/avaliacoes-cliente')->with('success', 'Avaliação do cliente criada com sucesso.');
    }

    public function show($id)
    {
        $avaliacao = AvaliacaoCliente::findOrFail($id);
        return view('avaliacoes-cliente.show', compact('avaliacao'));
    }

    public function edit($id)
    {
        $avaliacao = AvaliacaoCliente::findOrFail($id);
        return view('avaliacoes-cliente.edit', compact('avaliacao'));
    }

    public function update(Request $request, $id)
    {
        $avaliacao = AvaliacaoCliente::findOrFail($id);
        // Atualize os campos necessários da avaliação do cliente
        $avaliacao->update($request->all());
        return redirect('/avaliacoes-cliente')->with('success', 'Avaliação do cliente atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $avaliacao = AvaliacaoCliente::findOrFail($id);
        $avaliacao->delete();
        return redirect('/avaliacoes-cliente')->with('success', 'Avaliação do cliente removida com sucesso.');
    }
}
