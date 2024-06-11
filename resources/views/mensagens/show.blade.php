@extends('adminlte::page')

@section('title', 'Detalhes da Mensagem')

@section('content_header')
    <h1>Detalhes da Mensagem</h1>
@stop

@section('content')
<div>
    <a href="{{ url("/mensagens") }}" class="btn btn-warning">Voltar</a>
</div>
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalhes da Mensagem</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome:</strong> {{ $mensagem->nome }}</li>
                <li class="list-group-item"><strong>E-mail:</strong> {{ $mensagem->email }}</li>
                <li class="list-group-item"><strong>Assunto:</strong> {{ $mensagem->assunto }}</li>
                <li class="list-group-item"><strong>Conteúdo:</strong> {{ $mensagem->conteudo }}</li>
                <li class="list-group-item"><strong>Data de Criação:</strong> {{ date('d/m/Y', strtotime($mensagem->dataCriacao)) }}</li>
            </ul>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
