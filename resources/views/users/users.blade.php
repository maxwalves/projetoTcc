@extends('adminlte::page')

@section('title', 'Usuários do Sistema')

@section('content_header')
    <h1>Usuários do Sistema</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    @if(count($users) > 0)
    <table id="tabelaRota" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Setor</th> <!-- Adicionado o cabeçalho do setor -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $userLinha)
            <tr>
                <td>{{$userLinha->id}}</td>
                <td>{{$userLinha->name}}</td>
                <td>{{$userLinha->email}}</td>
                <td>{{ $userLinha->setor->nomeSetor ?? 'Não definido' }}</td> <!-- Mostrar o setor do usuário -->
                <td>
                    <a href="{{ url("/users/editPerfil/".$userLinha->id) }}" class="btn btn-success btn-sm">Gerenciar perfil</a>
                    <a href="{{ url("/users/edit/".$userLinha->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ url("/users/".$userLinha->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem usuários, <a href="{{ url("/users/create") }}"> Criar novo usuário</a></p>
    @endif
    <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/users/create") }}">Criar novo usuário</a>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
