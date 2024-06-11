<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoCliente;
use App\Models\Cliente;
use App\Models\FormularioAvaliacao;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setor;
use App\Models\Campo;
use App\Models\Resposta;

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

        /* $clientes = $clientes->filter(function ($cliente) use ($user) {
            return $cliente->setor_id == $user->setor_id;
        }); */

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

    public function createAvaliacaoCliente($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        $formularios = FormularioAvaliacao::all();
        return view('clientes.createAvaliacaoCliente', compact('cliente', 'formularios'));
    }

    //faça ua rota para paginaEnvioAvaliacao
    public function paginaEnvioAvaliacao($clienteId, $avaliacaoId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        $avaliacao = AvaliacaoCliente::findOrFail($avaliacaoId);

        // Gerar link do formulário
        $linkFormulario = url('clientes/formulario/' . $avaliacao->hash);

        // Texto da mensagem
        $mensagem = 'Por favor, preencha o formulário de satisfação! ' . $linkFormulario;

        // Codificar a mensagem para URL
        $mensagemCodificada = urlencode($mensagem);

        // Gerar link do WhatsApp
        $linkWhatsApp = 'https://wa.me/' . $cliente->telefone . '?text=' . $mensagemCodificada;

        return view('clientes.paginaEnvioAvaliacao', compact('cliente', 'avaliacao', 'linkWhatsApp'));
    }

    public function formularioAvaliacao($hash)
    {
        $avaliacao = AvaliacaoCliente::where('hash', $hash)->firstOrFail();
        $formulario = FormularioAvaliacao::findOrFail($avaliacao->formulario_avaliacao_id);
        $campos = Campo::where('formulario_avaliacao_id', $formulario->id)->get();
        return view('clientes.formularioAvaliacao', compact('avaliacao', 'formulario', 'campos'));
    }

    public function enviarAvaliacao(Request $request, $hash)
    {
        $avaliacao = AvaliacaoCliente::where('hash', $hash)->firstOrFail();
        $campos = Campo::where('formulario_avaliacao_id', $avaliacao->formulario_avaliacao_id)->get();

        foreach ($campos as $campo) {
            Resposta::create([
                'data' => now(),
                'campo_id' => $campo->id,
                'avaliacao_cliente_id' => $avaliacao->id,
                'resposta' => $request->input("resposta".$campo->id),
            ]);
        }

        $avaliacao->status = 'Concluída';
        $avaliacao->save();

        return redirect()->route('clientes.formularioAvaliacao', ['hash' => $hash])->with('success', 'Avaliação enviada com sucesso!');
    }
}
