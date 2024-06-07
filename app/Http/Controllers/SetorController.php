<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class SetorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $setores = Setor::all();
        return view('setores.index', compact('setores', 'user'));
    }

    public function clientesSetor($id)
    {
        $setorId = $id;
        $clientes = Cliente::all();
        $usuarios = User::all();
        $setores = Setor::all();

        $clientes = $clientes->filter(function ($cliente) use ($id) {
            return $cliente->setor_id == $id;
        });

        return view('setores.clientesSetor', compact('clientes', 'usuarios', 'setores', 'setorId'));
    }

    public function createClienteSetor($idSetor)
    {
        $usuarios = User::all();
        $setores = Setor::all();
        return view('setores.createCliente', compact('usuarios', 'setores', 'idSetor'));
    }

    public function editClienteSetor($idCliente)
    {
        $cliente = Cliente::findOrFail($idCliente);
        $usuarios = User::all();
        $setores = Setor::all();
        return view('setores.editCliente', compact('cliente', 'usuarios', 'setores'));
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

    public function storeClienteSetor(Request $request)
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
        
        return redirect('/setores')->with('success', 'Cliente criado com sucesso.');
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

    public function updateClienteSetor(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect('/setores')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $setor = Setor::findOrFail($id);
        $setor->delete();
        return redirect('/setores')->with('success', 'Setor removido com sucesso.');
    }
}
