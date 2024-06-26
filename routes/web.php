<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\SistemaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MensagensController;
use App\Models\Faq;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\FormularioAvaliacaoController;
use App\Http\Controllers\CampoController;
use App\Http\Controllers\AvaliacaoClienteController;
use App\Http\Controllers\RespostaController;
use App\Http\Controllers\HistoricoController;
use App\Models\Cliente;
use App\Models\Mensagem;
use App\Models\AvaliacaoCliente;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FaqController::class, 'welcome']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        $quantidadeClientes = Cliente::count();
        $quantidadeMensagens = Mensagem::count();
        $quantidadeAvaliacoes = AvaliacaoCliente::count();
        return view('dashboard', ['user' => $user, 'quantidadeClientes' => $quantidadeClientes, 'quantidadeMensagens' => $quantidadeMensagens, 'quantidadeAvaliacoes' => $quantidadeAvaliacoes]);
    })->name('dashboard');
});


// ROTAS PARA ADM USERS
Route::get('/users/users', [UsersController::class, 'users'])->middleware('auth')->name('users.users');
Route::get('/users/create', [UsersController::class, 'create'])->middleware('auth')->name('users.create');
Route::get('/users/{id}', [UsersController::class, 'show'])->middleware('auth')->name('users.show');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->middleware('auth')->name('users.destroy');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->middleware('auth')->name('users.edit');

Route::get('/users/editPerfil/{id}', [UsersController::class, 'editPerfil'])->middleware('auth')->name('users.editPerfil');
Route::get('/users/editPerfil/{id}/{ordem}', [UsersController::class, 'updatePerfil'])->middleware('auth')->name('users.updatePerfil');

Route::put('/users/update/{id}', [UsersController::class, 'update'])->middleware('auth')->name('users.update');
Route::post('/users', [UsersController::class, 'store'])->middleware('auth')->name('users.store');
Route::get('/sistema', [SistemaController::class, 'sistema'])->middleware('auth')->name('sistema');


Route::get('/faqs', [FaqController::class, 'index'])->middleware('auth');
Route::get('/faqs/create', [FaqController::class, 'create'])->middleware('auth');
Route::post('/faqs', [FaqController::class, 'store'])->middleware('auth');
Route::get('/faqs/{id}', [FaqController::class, 'show'])->middleware('auth');
Route::get('/faqs/edit/{id}', [FaqController::class, 'edit'])->middleware('auth');
Route::put('/faqs/{id}', [FaqController::class, 'update'])->middleware('auth');
Route::put('/updateFaq/{id}', [FaqController::class, 'updateFaq'])->middleware('auth');
Route::delete('/faqs/{id}', [FaqController::class, 'destroy'])->middleware('auth');

Route::get('/clientes', [ClientesController::class, 'index'])->middleware('auth')->name('clientes.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->middleware('auth')->name('clientes.create');
Route::post('/clientes', [ClientesController::class, 'store'])->middleware('auth')->name('clientes.store');
Route::get('/clientes/{id}', [ClientesController::class, 'show'])->middleware('auth')->name('clientes.show');
Route::get('/clientes/edit/{id}', [ClientesController::class, 'edit'])->middleware('auth')->name('clientes.edit');
Route::put('/clientes/{id}', [ClientesController::class, 'update'])->middleware('auth')->name('clientes.update');
Route::put('/updateCliente/{id}', [ClientesController::class, 'updateCliente'])->middleware('auth')->name('clientes.updateCliente');
Route::delete('/clientes/{id}', [ClientesController::class, 'destroy'])->middleware('auth')->name('clientes.destroy');

Route::get('/clientes/avaliacoes/{id}', [ClientesController::class, 'avaliacoesCliente'])->middleware('auth')->name('clientes.avaliacoes');
Route::post('/clientes/avaliacoes/store/{id}', [AvaliacaoClienteController::class, 'storeAvaliacao'])->middleware('auth')->name('clientes.avaliacoes.store');
Route::delete('/clientes/avaliacoes/{id}', [AvaliacaoClienteController::class, 'destroyAvaliacao'])->middleware('auth')->name('clientes.avaliacoes.destroy');
Route::get('/clientes/createAvaliacaoCliente/{clienteId}', [ClientesController::class, 'createAvaliacaoCliente'])->middleware('auth')->name('clientes.createAvaliacaoCliente');

Route::get('/clientes/historico/{id}', [HistoricoController::class, 'historicoCliente'])->middleware('auth')->name('clientes.historico');
Route::post('/clientes/historico/store/{id}', [HistoricoController::class, 'storeHistorico'])->middleware('auth')->name('clientes.historico.store');
Route::delete('/clientes/historico/{id}', [HistoricoController::class, 'destroyHistorico'])->middleware('auth')->name('clientes.historico.destroy');
Route::get('/clientes/editHistorico/{id}', [HistoricoController::class, 'editHistorico'])->middleware('auth')->name('clientes.editHistorico');
Route::put('/clientes/updateHistorico/{id}', [HistoricoController::class, 'updateHistorico'])->middleware('auth')->name('clientes.updateHistorico');
Route::get('/clientes/createHistorico/{clienteId}', [HistoricoController::class, 'createHistoricoCliente'])->middleware('auth')->name('clientes.createHistoricoCliente');
Route::get('/clientes/enviarAvaliacao/{clienteId}/{avaliacaoId}', [ClientesController::class, 'paginaEnvioAvaliacao'])->middleware('auth')->name('clientes.enviarAvaliacao');

Route::get('clientes/formulario/{hash}', [ClientesController::class, 'formularioAvaliacao'])->name('clientes.formularioAvaliacao');
Route::post('clientes/enviarAvaliacao/{hash}', [ClientesController::class, 'enviarAvaliacao'])->name('clientes.enviarAvaliacao');

Route::get('/setores', [SetorController::class, 'index'])->middleware('auth')->name('setores.index');
Route::get('/setores/create', [SetorController::class, 'create'])->middleware('auth')->name('setores.create');
Route::post('/setores', [SetorController::class, 'store'])->middleware('auth')->name('setores.store');
Route::get('/setores/{id}', [SetorController::class, 'show'])->middleware('auth')->name('setores.show');
Route::get('/setores/edit/{id}', [SetorController::class, 'edit'])->middleware('auth')->name('setores.edit');
Route::put('/setores/{id}', [SetorController::class, 'update'])->middleware('auth')->name('setores.update');
Route::delete('/setores/{id}', [SetorController::class, 'destroy'])->middleware('auth')->name('setores.destroy');
Route::get('/clientesSetor/{id}', [SetorController::class, 'clientesSetor'])->middleware('auth')->name('clientesSetor');
Route::get('/clientesSetor/create/{idSetor}', [SetorController::class, 'createClienteSetor'])->middleware('auth')->name('clientesSetor.create');
Route::get('/clientesSetor/edit/{idCliente}', [SetorController::class, 'editClienteSetor'])->middleware('auth')->name('clientesSetor.edit');
Route::post('/clientesSetor', [SetorController::class, 'storeClienteSetor'])->middleware('auth')->name('clientesSetor.store');
Route::put('/clientesSetor/{id}', [SetorController::class, 'updateClienteSetor'])->middleware('auth')->name('clientesSetor.update');


Route::get('/mensagens', [MensagensController::class, 'index'])->middleware('auth')->name('mensagens.index');
Route::get('/mensagens/create', [MensagensController::class, 'create'])->middleware('auth')->name('mensagens.create');
Route::post('/mensagens', [MensagensController::class, 'store'])->middleware('auth')->name('mensagens.store');
Route::post('/mensagensInicial', [MensagensController::class, 'storeInicial'])->name('mensagens.storeInicial');
Route::get('/mensagens/{id}', [MensagensController::class, 'show'])->middleware('auth')->name('mensagens.show');
Route::get('/mensagens/edit/{id}', [MensagensController::class, 'edit'])->middleware('auth')->name('mensagens.edit');
Route::put('/mensagens/{id}', [MensagensController::class, 'update'])->middleware('auth')->name('mensagens.update');
Route::put('/updateMensagem/{id}', [MensagensController::class, 'updateCliente'])->middleware('auth')->name('mensagens.updateCliente');
Route::delete('/mensagens/{id}', [MensagensController::class, 'destroy'])->middleware('auth')->name('mensagens.destroy');

Route::get('/formularios-avaliacao', [FormularioAvaliacaoController::class, 'index'])->middleware('auth');
Route::get('/formularios-avaliacao/create', [FormularioAvaliacaoController::class, 'create'])->middleware('auth');
Route::post('/formularios-avaliacao', [FormularioAvaliacaoController::class, 'store'])->middleware('auth');
Route::get('/formularios-avaliacao/{id}', [FormularioAvaliacaoController::class, 'show'])->middleware('auth');
Route::get('/formularios-avaliacao/edit/{id}', [FormularioAvaliacaoController::class, 'edit'])->middleware('auth');
Route::put('/formularios-avaliacao/{id}', [FormularioAvaliacaoController::class, 'update'])->middleware('auth');
Route::put('/updateFormularioAvaliacao/{id}', [FormularioAvaliacaoController::class, 'updateFormularioAvaliacao'])->middleware('auth');
Route::delete('/formularios-avaliacao/{id}', [FormularioAvaliacaoController::class, 'destroy'])->middleware('auth');

Route::get('/campos', [CampoController::class, 'index'])->middleware('auth');
Route::get('/campos/create', [CampoController::class, 'create'])->middleware('auth');
Route::post('/campos', [CampoController::class, 'store'])->middleware('auth');
Route::get('/campos/{id}', [CampoController::class, 'show'])->middleware('auth');
Route::get('/campos/edit/{id}', [CampoController::class, 'edit'])->middleware('auth');
Route::put('/campos/{id}', [CampoController::class, 'update'])->middleware('auth');
Route::put('/updateCampo/{id}', [CampoController::class, 'updateCampo'])->middleware('auth');
Route::delete('/campos/{id}', [CampoController::class, 'destroy'])->middleware('auth');


Route::get('/avaliacoes-cliente', [AvaliacaoClienteController::class, 'index'])->middleware('auth')->name('avaliacoes-cliente.index');
Route::get('/avaliacoes-cliente/create', [AvaliacaoClienteController::class, 'create'])->middleware('auth')->name('avaliacoes-cliente.create');
Route::post('/avaliacoes-cliente', [AvaliacaoClienteController::class, 'store'])->middleware('auth')->name('avaliacoes-cliente.store');
Route::get('/avaliacoes-cliente/{id}', [AvaliacaoClienteController::class, 'show'])->middleware('auth')->name('avaliacoes-cliente.show');
Route::get('/avaliacoes-cliente/edit/{id}', [AvaliacaoClienteController::class, 'edit'])->middleware('auth')->name('avaliacoes-cliente.edit');
Route::put('/avaliacoes-cliente/{id}', [AvaliacaoClienteController::class, 'update'])->middleware('auth')->name('avaliacoes-cliente.update');
Route::put('/updateAvaliacaoCliente/{id}', [AvaliacaoClienteController::class, 'updateAvaliacaoCliente'])->middleware('auth')->name('avaliacoes-cliente.updateAvaliacaoCliente');
Route::delete('/avaliacoes-cliente/{id}', [AvaliacaoClienteController::class, 'destroy'])->middleware('auth')->name('avaliacoes-cliente.destroy');
Route::get('/avaliacoes-cliente/{clienteId}/{avaliacaoId}', [AvaliacaoClienteController::class, 'show'])->middleware('auth')->name('avaliacoes-cliente.show');


Route::get('/respostas', [RespostaController::class, 'index'])->middleware('auth');
Route::get('/respostas/create', [RespostaController::class, 'create'])->middleware('auth');
Route::post('/respostas', [RespostaController::class, 'store'])->middleware('auth');
Route::get('/respostas/{id}', [RespostaController::class, 'show'])->middleware('auth');
Route::get('/respostas/edit/{id}', [RespostaController::class, 'edit'])->middleware('auth');
Route::put('/respostas/{id}', [RespostaController::class, 'update'])->middleware('auth');
Route::delete('/respostas/{id}', [RespostaController::class, 'destroy'])->middleware('auth');

Route::get('/historicos', [HistoricoController::class, 'index'])->middleware('auth');
Route::get('/historicos/create', [HistoricoController::class, 'create'])->middleware('auth');
Route::post('/historicos', [HistoricoController::class, 'store'])->middleware('auth');
Route::get('/historicos/{id}', [HistoricoController::class, 'show'])->middleware('auth');
Route::get('/historicos/edit/{id}', [HistoricoController::class, 'edit'])->middleware('auth');
Route::put('/historicos/{id}', [HistoricoController::class, 'update'])->middleware('auth');
Route::delete('/historicos/{id}', [HistoricoController::class, 'destroy'])->middleware('auth');
