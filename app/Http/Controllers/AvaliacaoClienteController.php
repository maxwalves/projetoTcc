<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvaliacaoCliente;
use App\Models\Cliente;
use App\Models\FormularioAvaliacao;
use App\Models\Resposta;

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
    //faça uma rota para storeAvaliacao
    public function storeAvaliacao(Request $request, $id)
    {
        $avaliacao = new AvaliacaoCliente();
        //faça para os seguintes atributos: 'data', 'cliente_id', 'formulario_avaliacao_id', 'status', 'hash'
        $avaliacao->data = $request->data;
        $avaliacao->cliente_id = $request->cliente_id;
        $avaliacao->formulario_avaliacao_id = $request->formulario_avaliacao_id;
        $avaliacao->status = $request->status;
        $avaliacao->hash = md5(uniqid());

        $avaliacao->save();
        return redirect('/clientes/avaliacoes/' . $id)->with('success', 'Avaliação do cliente criada com sucesso.');
    }

    public function show($clienteId, $avaliacaoId)
    {
        $avaliacao = AvaliacaoCliente::findOrFail($avaliacaoId);
        $cliente = Cliente::findOrFail($clienteId);
        $campos = $avaliacao->formularioAvaliacao->campos;
        $respostas = Resposta::all();

        return view('avaliacoes-cliente.show', compact('avaliacao', 'cliente', 'campos', 'respostas'));
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

    //faça um método para destroyAvaliacao
    public function destroyAvaliacao($avaliacaoId)
    {
        $avaliacao = AvaliacaoCliente::findOrFail($avaliacaoId);
        $idCliente = $avaliacao->cliente_id;
        
        $avaliacao->delete();
        return redirect('/clientes/avaliacoes/' . $idCliente)->with('success', 'Avaliação do cliente removida com sucesso.');
    }
}
