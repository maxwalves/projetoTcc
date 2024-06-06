@extends('adminlte::page')

@section('title', 'Criar Novo Histórico')

@section('content_header')
    <h1>Criar Novo Histórico</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/historicos") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ date('Y-m-d') }}" readonly required>
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select class="form-control" name="cliente_id" id="cliente_id" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipoRegistro">Tipo de Registro:</label>
            <input type="text" class="form-control" name="tipoRegistro" id="tipoRegistro" required>
        </div>
        <div class="form-group">
            <label for="anexo">Anexo:</label>
            <input type="file" class="form-control" name="anexo" id="anexo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/historicos") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
