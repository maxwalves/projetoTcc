@extends('adminlte::page')

@section('title', 'Detalhes da Avaliação do Cliente')

@section('content_header')
    <h1>Detalhes da Avaliação do Cliente</h1>
@stop

@section('content')
<div class="col-md-10 offset-md-1 dashboard-avs-container">

    <a href="{{ route('clientes.avaliacoes', ['id' => $avaliacao->cliente->id]) }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Avaliação número <strong>{{ $avaliacao->id }}</strong> do cliente <strong>{{ $avaliacao->cliente->nome }}</strong> </h3>
        </div>
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">Dados da avaliação</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="data">Data:</label>
                            <p>{{ date('d/m/Y', strtotime($avaliacao->data)) }}</p>
                        </div>
                        <div class="form-group">
                            <label for="cliente">Cliente:</label>
                            <p>{{ $avaliacao->cliente->nome }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formulario_avaliacao">Formulário de Avaliação:</label>
                            <p>{{ $avaliacao->formularioAvaliacao->descricao }}</p>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <p>{{ $avaliacao->status }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($campos as $campo)
                <div class="form-group">
                    <label for="{{ $campo->id }}">{{ $campo->pergunta }}:</label>
                    @foreach($respostas as $resposta)
                        @if($resposta->campo_id == $campo->id && $resposta->avaliacao_cliente_id == $avaliacao->id)
                            <p>{{ $resposta->resposta }}</p>
                        @endif
                    @endforeach
                </div>
            @endforeach
            
        </div>
        
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
