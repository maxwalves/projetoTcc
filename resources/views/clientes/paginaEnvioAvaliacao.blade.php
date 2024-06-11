@extends('adminlte::page')

@section('title', 'Gerenciar Avaliações de Clientes')

@section('content_header')
    <h1>Enviar Avaliação a Cliente</h1>
@stop

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-avs-container">

        <a href="{{ route('clientes.avaliacoes', ['id' => $cliente->id]) }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>


        <h1>Enviar Avaliação para {{ $cliente->nome }}</h1>
        <p>Para enviar o formulário de satisfação, clique no botão abaixo:</p>
        <a href="{{ $linkWhatsApp }}" target="_blank" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Enviar via WhatsApp</a>
    </div>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop
