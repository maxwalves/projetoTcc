@extends('adminlte::page')

@section('title', 'Editar Mensagem')

@section('content_header')
    <h1>Editar Mensagem</h1>
@stop

@section('content')
<div>
    <a href="{{ url("/mensagens") }}" class="btn btn-warning">Voltar</a>
</div>
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/mensagens/".$mensagem->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $mensagem->nome }}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $mensagem->email }}" required>
        </div>
        <div class="form-group">
            <label for="projeto">Projeto:</label>
            <input type="text" class="form-control" name="projeto" id="projeto" value="{{ $mensagem->projeto }}" required>
        </div>
        <div class="form-group">
            <label for="conteudo">Conteúdo:</label>
            <textarea class="form-control" name="conteudo" id="conteudo" required>{{ $mensagem->conteudo }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/mensagens") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
    
@stop
