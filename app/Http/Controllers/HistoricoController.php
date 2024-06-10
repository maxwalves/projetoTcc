<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;
use App\Models\Cliente;

class HistoricoController extends Controller
{
    public function index()
    {
        $historicos = Historico::all();
        return view('historicos.index', compact('historicos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('historicos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $historico = new Historico();
        $historico->data = $request->data;
        $historico->tipoRegistro = $request->tipoRegistro;
        $historico->descricao = $request->descricao;
        
        if ($request->hasFile('anexo')) {
            $file = $request->file('anexo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $historico->anexo = $filename;
        }

        $historico->cliente()->associate($request->cliente_id);
        $historico->save();
        return redirect('/historicos')->with('success', 'Histórico criado com sucesso.');
    }

    public function show($id)
    {
        $historico = Historico::findOrFail($id);
        return view('historicos.show', compact('historico'));
    }

    public function edit($id)
    {
        $historico = Historico::findOrFail($id);
        $clientes = Cliente::all();
        return view('historicos.edit', compact('historico', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $historico = Historico::findOrFail($id);
        $historico->data = $request->data;
        $historico->tipoRegistro = $request->tipoRegistro;
        $historico->descricao = $request->descricao;

        if ($request->hasFile('anexo')) {
            $file = $request->file('anexo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $historico->anexo = $filename;
        }

        $historico->cliente_id = $request->cliente_id;
        $historico->save();

        return redirect('/historicos')->with('success', 'Histórico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $historico = Historico::findOrFail($id);
        $historico->delete();
        return redirect('/historicos')->with('success', 'Histórico removido com sucesso.');
    }

    public function historicoCliente($id)
    {
        $cliente = Cliente::findOrFail($id);
        $historicos = $cliente->historicos;

        return view('clientes.historico', compact('cliente', 'historicos'));
    }

    public function storeHistorico(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        
        $historico = new Historico();
        $historico->data = $request->data;
        $historico->tipoRegistro = $request->tipoRegistro;
        $historico->descricao = $request->descricao;
        
        if ($request->hasFile('anexo')) {
            $file = $request->file('anexo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $historico->anexo = $filename;
        }
        
        $cliente->historicos()->save($historico);
        
        return redirect('/clientes/historico/' . $id)->with('success', 'Histórico criado com sucesso.');
    }

    public function destroyHistorico($id)
    {
        $historico = Historico::findOrFail($id);
        $clienteId = $historico->cliente_id;
        $historico->delete();
        return redirect('/clientes/historico/' . $clienteId)->with('success', 'Histórico removido com sucesso.');
    }

    public function editHistorico($id)
    {
        $historico = Historico::findOrFail($id);
        $clientes = Cliente::all();
        return view('clientes.editHistorico', compact('historico', 'clientes'));
    }

    public function updateHistorico(Request $request, $id)
    {
        $historico = Historico::findOrFail($id);
        $historico->data = $request->data;
        $historico->tipoRegistro = $request->tipoRegistro;
        $historico->descricao = $request->descricao;
        
        if ($request->hasFile('anexo')) {
            $file = $request->file('anexo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $historico->anexo = $filename;
        }
        
        $historico->save();
        
        return redirect('/clientes/historico/' . $historico->cliente_id)->with('success', 'Histórico atualizado com sucesso!');
    }

    public function createHistoricoCliente($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        $clientes = Cliente::all();
        return view('clientes.createHistorico', compact('cliente', 'clientes'));
    }
}
