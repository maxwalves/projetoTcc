@extends('adminlte::page')

@section('title', 'Criar Nova Mensagem')

@section('content_header')
    <h1>Criar Nova Mensagem</h1>
@stop

@section('content')
<div>
    <a href="{{ url("/mensagensInicial") }}" class="btn btn-warning">Voltar</a>
</div>
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/mensagens") }}" method="POST">
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
            <label for="assunto">Assunto:</label>
            <input type="text" class="form-control" name="assunto" id="assunto" required>
        </div>
        <div class="form-group">
            <label for="conteudo">Conteúdo:</label>
            <textarea class="form-control" name="conteudo" id="conteudo" required></textarea>
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
