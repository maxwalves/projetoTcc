@extends('adminlte::page')

@section('title', 'Criar Novo Campo')

@section('content_header')
    <h1>Criar Novo Campo</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/campos") }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pergunta">Pergunta:</label>
            <input type="text" class="form-control" name="pergunta" id="pergunta" required>
        </div>
        <div class="form-group">
            <label for="formulario_avaliacao_id">Formulário de Avaliação:</label>
            <select class="form-control" name="formulario_avaliacao_id" id="formulario_avaliacao_id" required>
                @foreach($formularios as $formulario)
                    <option value="{{ $formulario->id }}">{{ $formulario->descricao }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/campos") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
