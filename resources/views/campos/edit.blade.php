@extends('adminlte::page')

@section('title', 'Editar Campo')

@section('content_header')
    <h1>Editar Campo</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/campos/".$campo->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="pergunta">Pergunta:</label>
            <input type="text" class="form-control" name="pergunta" id="pergunta" value="{{ $campo->pergunta }}" required>
        </div>
        <div class="form-group">
            <label for="formulario_avaliacao_id">Formulário de Avaliação:</label>
            <select class="form-control" name="formulario_avaliacao_id" id="formulario_avaliacao_id" required>
                @foreach($formularios as $formulario)
                    <option value="{{ $formulario->id }}" {{ $campo->formulario_avaliacao_id == $formulario->id ? 'selected' : '' }}>{{ $formulario->descricao }}</option>
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
    <script> console.log('Hi!'); </script>
@stop
