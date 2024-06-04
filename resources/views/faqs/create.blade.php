@extends('adminlte::page')

@section('title', 'Criar Novo Item FAQ')

@section('content_header')
    <h1>Criar Novo Item FAQ</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/faqs") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pergunta">Pergunta:</label>
            <input type="text" class="form-control" name="pergunta" id="pergunta" required>
        </div>
        <div class="form-group">
            <label for="resposta">Resposta:</label>
            <input type="text" class="form-control" name="resposta" id="resposta" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/faqs") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
