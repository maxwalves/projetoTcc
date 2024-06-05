@extends('adminlte::page')

@section('title', 'Criar Setor')

@section('content_header')
    <h1>Criar Setor</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url('/setores') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomeSetor">Nome do Setor:</label>
            <input type="text" class="form-control" name="nomeSetor" id="nomeSetor" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url('/setores') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
