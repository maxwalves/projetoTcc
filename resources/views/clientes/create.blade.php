@extends('adminlte::page')

@section('title', 'Criar Novo Cliente')

@section('content_header')
    <h1>Criar Novo Cliente</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/clientes") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" name="telefone" id="telefone" required>
        </div>
        <div class="form-group">
            <label for="usuario_id">Vincular a um usuário do sistema:</label>
            <select class="form-control" name="usuario_id" id="usuario_id" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="setor_id">Setor:</label>
            <select class="form-control" name="setor_id" id="setor_id" required>
                @foreach($setores as $setor)
                    <option value="{{ $setor->id }}">{{ $setor->nomeSetor }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/clientes") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
