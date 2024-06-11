@extends('adminlte::page')

@section('title', 'Formulário de Avaliação')

@section('content_header')
    <h1>Formulário de Avaliação</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($avaliacao->status != 'Concluída')
        <div class="col-md-10 offset-md-1 dashboard-avs-container">
            <h1>Formulário de Avaliação para {{ $avaliacao->cliente->nome }}</h1>
            <form action="{{ route('clientes.enviarAvaliacao', ['hash' => $avaliacao->hash]) }}" method="POST">
                @csrf
                @foreach ($campos as $campo)
                    <div class="form-group">
                        <label for="{{ $campo->id }}">{{ $campo->pergunta }}</label>
                        <input type="number" class="form-control" id="resposta{{ $campo->id }}"
                            name="resposta{{ $campo->id }}" min="1" max="10" required>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Enviar Avaliação</button>
            </form>
        </div>
    @else
        <div class="col-md-10 offset-md-1 dashboard-avs-container">
            <h1>Formulário de Avaliação para {{ $avaliacao->cliente->nome }}</h1>
            <p>Esta avaliação já foi concluída.</p>
        </div>
    @endif
@stop

@section('css')
    <style>
        /* remova tudo que tiver a classe "autenticado" */
        .autenticado {
            display: none;
        }
    </style>
@stop

@section('js')
    <!-- Adicione seu JavaScript personalizado aqui -->
@stop

@section('layout_topnav', 'true')
