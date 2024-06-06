@extends('adminlte::page')

@section('title', 'Editar Avaliação de Cliente')

@section('content_header')
    <h1>Editar Avaliação de Cliente</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/avaliacoes-cliente/".$avaliacaoCliente->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ $avaliacaoCliente->data }}" required>
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select class="form-control" name="cliente_id" id="cliente_id" required>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $cliente->id == $avaliacaoCliente->cliente_id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="formulario_avaliacao_id">Formulário de Avaliação:</label>
            <select class="form-control" name="formulario_avaliacao_id" id="formulario_avaliacao_id" required>
                @foreach($formularios as $formulario)
                <option value="{{ $formulario->id }}" {{ $formulario->id == $avaliacaoCliente->formulario_avaliacao_id ? 'selected' : '' }}>{{ $formulario->descricao }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" name="status" id="status" value="{{ $avaliacaoCliente->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/avaliacoes-cliente") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
