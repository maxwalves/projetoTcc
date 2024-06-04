<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

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
        return view('clientes.index', compact('clientes', 'user'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $dataCriacao = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
        $cliente->dataCriacao = $dataCriacao->format('Y-m-d H:i:s');

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
        return view('clientes.edit', compact('cliente'));
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
}
