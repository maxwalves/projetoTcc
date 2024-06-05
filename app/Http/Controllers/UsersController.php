<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Setor;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PHPUnit\TextUI\Configuration\Php;
use DateTimeZone;
use DateTime;

class UsersController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();
        return response(json_encode($users, JSON_PRETTY_PRINT), 200)->header('Content-Type', 'application/json');
    }

    public function dss()
    {
        $user = auth()->user();
        $users = User::all();
        return redirect('https://sistemas.paranacidade.org.br/dss/');
    }

    public function index()
    {
        $user = auth()->user();
        $userEncontrado = User::findOrFail($user->id);
        $permission = Permission::where('name', 'view users')->first();

        $users = User::all();
        $setores = Setor::all();

        if ($userEncontrado->hasPermissionTo($permission)) {
            // O usuário tem a permissão 'view users', permita a visualização de usuários
            return view('users.users', ['users' => $users, 'user'=> $user, 'setores' => $setores]);
        } else {
            // O usuário não tem a permissão 'view users', redirecionar para a página de erro 403
            return abort(403, 'Unauthorized');
        }
    }

    public function users()
    {
        $user = auth()->user();
        $userEncontrado = User::findOrFail($user->id);
        $users = User::all();
        $setores = Setor::all();

        //$permission = Permission::where('name', 'view users')->first();
        //$userEncontrado->givePermissionTo($permission); //Criar uma tela de gerenciamento de perfil para o usuário

        try {
            if (true) {//Gate::authorize('view users', $userEncontrado)
                
                return view('users.users', ['users' => $users, 'user'=> $user, 'setores' => $setores]);
        }
        } catch (\Throwable $th) {
            return view('unauthorized', ['user'=> $user]);
        }

    }

    public function create()
    {
        $user = auth()->user();
        $setores = Setor::all();
        return view('users.createUser', ['user'=> $user, 'setores' => $setores]);
    }

    public function naoAutorizado()
    {
        return view('unauthorized');
    }

    public function store(Request $request)
    {

        $regras = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ];
        $mensagens = [
            'required' => 'Este campo não pode estar em branco',
        ];
        $request->validate($regras, $mensagens);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->setor_id = $request->setor_id;
        
        $user->save();

        return redirect('/users/users')->with('msg', 'Usuário criado com sucesso!');
    }

    public function show($id)
    {
        $user = auth()->user();
        $users = User::findOrFail($id);
        $setores = Setor::all();

        return view('users.show', ['users' => $users, 'user'=> $user, 'setores' => $setores]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        return redirect('/users/users')->with('msg', 'Usuário excluído com sucesso!');
    }

    public function edit($id)
    {
        $user = auth()->user();
        $setores = Setor::all();

        $usuarioEditado = User::findOrFail($id);

        return view('users.editUser', ['usuarioEditado' => $usuarioEditado, 'user'=> $user, 'setores' => $setores]);
    }

    public function editPerfil($id)
    {
        $user = auth()->user();

        $usuarioEditar = User::findOrFail($id);

        $permission1 = Permission::where('name', 'view users')->first();
        $permission2 = Permission::where('name', 'edit users')->first();

        $dados = [];

        try {
            $dados += ["permission1"=> ($usuarioEditar->hasPermissionTo($permission1) ? "true" : "false")];
    
        } catch (\Throwable $th) {
            $dados += ["permission1"=> "false"];
        }
        try {
            $dados += ["permission2"=> ($usuarioEditar->hasPermissionTo($permission2) ? "true" : "false")];
        } catch (\Throwable $th) {
            $dados += ["permission2"=> "false"];
        }
        
        return view('users.editPerfil', ['usuarioEditar' => $usuarioEditar, 'user'=> $user, 'dados' => $dados]);
    }
    public function updatePerfil($id, $ordem)
    {
        $user = auth()->user();

        $usuarioEditar = User::findOrFail($id);

        $permission1 = Permission::where('name', 'view users')->first();
        $permission2 = Permission::where('name', 'edit users')->first();

        $dados = [];
        
        if($ordem == 'desativarAdmin')
        {
            $usuarioEditar->revokePermissionTo($permission1);
        }
        //----------------------------------------------------------------------------------
        else if($ordem == 'ativarAdmin')
        {
            $usuarioEditar->givePermissionTo($permission1);
        }

        try {
            $dados += ["permission1"=> ($usuarioEditar->hasPermissionTo($permission1) ? "true" : "false")];
    
        } catch (\Throwable $th) {
            $dados += ["permission1"=> "false"];
        }
        try {
            $dados += ["permission2"=> ($usuarioEditar->hasPermissionTo($permission2) ? "true" : "false")];
        } catch (\Throwable $th) {
            $dados += ["permission2"=> "false"];
        }

        return view('users.editPerfil', ['usuarioEditar' => $usuarioEditar, 'user'=> $user, 'dados' => $dados]);
    }

    public function aprovarTermoResponsabilidade(Request $request)
    {
        $user = auth()->user();
        $timezone = new DateTimeZone('America/Sao_Paulo');

        $data = array(
            "dataAssinaturaTermo"=> new DateTime('now', $timezone)
        );
        
        User::findOrFail($user->id)->update($data);

        return view('welcome', ['user'=> $user]);
    }
    
    public function termoResponsabilidade(){

        $user = auth()->user();
        return view('termoResponsabilidade', ['user'=> $user]);
    }

    public function update(Request $request)
    {
        $data = array(
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password), 
            "setor_id"=> $request->setor_id,
        );

        $regras = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
        ];
        $mensagens = [
            'required' => 'Este campo não pode estar em branco',
        ];
        $request->validate($regras, $mensagens);
        
        User::findOrFail($request->id)->update($data);

        return redirect('/users/users')->with('msg', 'Usuário editado com sucesso!');
    }
}
