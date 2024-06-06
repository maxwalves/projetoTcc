@extends('adminlte::page')

@section('title', 'Editar Resposta')

@section('content_header')
    <h1>Editar Resposta</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">
    <form action="{{ url("/respostas/".$resposta->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ $resposta->data }}" required>
        </div>
        <div class="form-group">
            <label for="campo_id">Campo:</label>
            <select class="form-control" name="campo_id" id="campo_id" required>
                @foreach($campos as $campo)
                    <option value="{{ $campo->id }}" {{ $resposta->campo_id == $campo->id ? 'selected' : '' }}>{{ $campo->pergunta }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="avaliacao_cliente_id">Avaliação do Cliente:</label>
            <select class="form-control" name="avaliacao_cliente_id" id="avaliacao_cliente_id" required>
                @foreach($avaliacoes as $avaliacao)
                    <option value="{{ $avaliacao->id }}" {{ $resposta->avaliacao_cliente_id == $avaliacao->id ? 'selected' : '' }}>ID: {{ $avaliacao->id }} - Cliente: {{ $avaliacao->cliente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="resposta">Resposta:</label>
            <input type="text" class="form-control" name="resposta" id="resposta" value="{{ $resposta->resposta }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ url("/respostas") }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
