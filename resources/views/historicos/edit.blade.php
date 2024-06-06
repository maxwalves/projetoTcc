@extends('adminlte::page')

@section('title', 'Editar Histórico')

@section('content_header')
    <h1>Editar Histórico</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/historicos/".$historico->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ $historico->data }}" required>
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select class="form-control" name="cliente_id" id="cliente_id" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $historico->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipoRegistro">Tipo de Registro:</label>
            <input type="text" class="form-control" name="tipoRegistro" id="tipoRegistro" value="{{ $historico->tipoRegistro }}" required>
        </div>
        <div class="form-group">
            <label for="anexo">Anexo:</label>
            <input type="file" class="form-control" name="anexo" id="anexo">
            @if($historico->anexo)
                <p>Anexo atual: <a href="{{ asset('uploads/'.$historico->anexo) }}" target="_blank">{{ $historico->anexo }}</a></p>
            @endif
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3" required>{{ $historico->descricao }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/historicos") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
