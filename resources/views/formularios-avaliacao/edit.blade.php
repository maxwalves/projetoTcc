@extends('adminlte::page')

@section('title', 'Editar Formulário de Avaliação')

@section('content_header')
    <h1>Editar Formulário de Avaliação</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/formularios-avaliacao/".$formulario->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $formulario->descricao }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/formularios-avaliacao") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
