<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\FormularioAvaliacao;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setor;

class ClientesController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function sobre()
    {
        return view('about');
    }

    public function index()
    {
        $user = auth()->user();
        $clientes = Cliente::all();
        $usuarios = User::all();
        $setores = Setor::all();

        $clientes = $clientes->filter(function ($cliente) use ($user) {
            return $cliente->setor_id == $user->setor_id;
        });

        return view('clientes.index', compact('clientes', 'user', 'usuarios', 'setores'));
    }

    public function create()
    {
        $usuarios = User::all();
        $setores = Setor::all();
        return view('clientes.create', compact('usuarios', 'setores'));
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $dataCriacao = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
        $cliente->dataCriacao = $dataCriacao->format('Y-m-d H:i:s');
        $cliente->usuario_id = $request->usuario_id;
        $cliente->setor_id = $request->setor_id;

        $cliente->save();
        
        return redirect('/clientes')->with('success', 'Cliente criado com sucesso.');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $usuarios = User::all();
        $setores = Setor::all();
        return view('clientes.edit', compact('cliente', 'usuarios', 'setores'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect('/clientes')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function updateCliente(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return "Cliente atualizado com sucesso!";
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect('/clientes')->with('success', 'Cliente removido com sucesso.');
    }

    public function avaliacoesCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $avaliacoes = $cliente->avaliacoes;

        return view('clientes.avaliacoes', compact('cliente', 'avaliacoes'));
    }

    public function historicoCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $historicos = $cliente->historicos;

        return view('clientes.historico', compact('cliente', 'historicos'));
    }

    //faça uma function para createAvaliacaoCliente
    public function createAvaliacaoCliente($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        $formularios = FormularioAvaliacao::all();
        return view('clientes.createAvaliacaoCliente', compact('cliente', 'formularios'));
    }

}
