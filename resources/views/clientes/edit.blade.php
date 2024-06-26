@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/clientes/".$cliente->id) }}" method="POST">
        @method('PUT')
        @csrf

        <a href="{{ route('clientes.index') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>
        
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $cliente->nome }}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $cliente->email }}" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $cliente->telefone }}" required>
        </div>
        <div class="form-group">
            <label for="usuario_id">Usuário:</label>
            <select class="form-control" name="usuario_id" id="usuario_id" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $cliente->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="setor_id">Setor:</label>
            <select class="form-control" name="setor_id" id="setor_id" required>
                @foreach($setores as $setor)
                    <option value="{{ $setor->id }}" {{ $cliente->setor_id == $setor->id ? 'selected' : '' }}>{{ $setor->nomeSetor }}</option>
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
