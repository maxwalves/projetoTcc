<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\SistemaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MensagensController;
use App\Models\Faq;
use App\Http\Controllers\SetorController;

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
Route::get('/sobre', [FaqController::class, 'sobre']);
Route::get('/servicos', [FaqController::class, 'servicos']);
Route::get('/projetos', [FaqController::class, 'projetos']);
Route::get('/contato', [FaqController::class, 'contato']);
Route::get('/criacaoSites', [FaqController::class, 'criacaoSites']);
Route::get('/criacaoSoftware', [FaqController::class, 'criacaoSoftware']);
Route::get('/criacaoLogo', [FaqController::class, 'criacaoLogo']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        return view('dashboard', ['user' => $user]);
    })->name('dashboard');
});


// ROTAS PARA ADM USERS
Route::get('/users/users', [UsersController::class, 'users'])->middleware('auth');
Route::get('/users/create', [UsersController::class, 'create'])->middleware('auth');
Route::get('/users/{id}', [UsersController::class, 'show'])->middleware('auth');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->middleware('auth');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->middleware('auth');

Route::get('/users/editPerfil/{id}', [UsersController::class, 'editPerfil'])->middleware('auth');
Route::get('/users/editPerfil/{id}/{ordem}', [UsersController::class, 'updatePerfil'])->middleware('auth');

Route::put('/users/update/{id}', [UsersController::class, 'update'])->middleware('auth');
Route::post('/users', [UsersController::class, 'store'])->middleware('auth');
Route::get('/sistema', [SistemaController::class, 'sistema'])->middleware('auth');


Route::get('/faqs', [FaqController::class, 'index'])->middleware('auth');
Route::get('/faqs/create', [FaqController::class, 'create'])->middleware('auth');
Route::post('/faqs', [FaqController::class, 'store'])->middleware('auth');
Route::get('/faqs/{id}', [FaqController::class, 'show'])->middleware('auth');
Route::get('/faqs/edit/{id}', [FaqController::class, 'edit'])->middleware('auth');
Route::put('/faqs/{id}', [FaqController::class, 'update'])->middleware('auth');
Route::put('/updateFaq/{id}', [FaqController::class, 'updateFaq'])->middleware('auth');
Route::delete('/faqs/{id}', [FaqController::class, 'destroy'])->middleware('auth');

Route::get('/clientes', [ClientesController::class, 'index'])->middleware('auth');
Route::get('/clientes/create', [ClientesController::class, 'create'])->middleware('auth');
Route::post('/clientes', [ClientesController::class, 'store'])->middleware('auth');
Route::get('/clientes/{id}', [ClientesController::class, 'show'])->middleware('auth');
Route::get('/clientes/edit/{id}', [ClientesController::class, 'edit'])->middleware('auth');
Route::put('/clientes/{id}', [ClientesController::class, 'update'])->middleware('auth');
Route::put('/updateCliente/{id}', [ClientesController::class, 'updateCliente'])->middleware('auth');
Route::delete('/clientes/{id}', [ClientesController::class, 'destroy'])->middleware('auth');



Route::get('/setores', [SetorController::class, 'index'])->middleware('auth');
Route::get('/setores/create', [SetorController::class, 'create'])->middleware('auth');
Route::post('/setores', [SetorController::class, 'store'])->middleware('auth');
Route::get('/setores/{id}', [SetorController::class, 'show'])->middleware('auth');
Route::get('/setores/edit/{id}', [SetorController::class, 'edit'])->middleware('auth');
Route::put('/setores/{id}', [SetorController::class, 'update'])->middleware('auth');
Route::delete('/setores/{id}', [SetorController::class, 'destroy'])->middleware('auth');


Route::get('/mensagens', [MensagensController::class, 'index'])->middleware('auth');
Route::get('/mensagens/create', [MensagensController::class, 'create'])->middleware('auth');
Route::post('/mensagens', [MensagensController::class, 'store'])->middleware('auth');
Route::post('/mensagensInicial', [MensagensController::class, 'storeInicial']);
Route::get('/mensagens/{id}', [MensagensController::class, 'show'])->middleware('auth');
Route::get('/mensagens/edit/{id}', [MensagensController::class, 'edit'])->middleware('auth');
Route::put('/mensagens/{id}', [MensagensController::class, 'update'])->middleware('auth');
Route::put('/updateMensagem/{id}', [MensagensController::class, 'updateCliente'])->middleware('auth');
Route::delete('/mensagens/{id}', [MensagensController::class, 'destroy'])->middleware('auth');
