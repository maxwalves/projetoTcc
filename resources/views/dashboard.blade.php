@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    Bem-vindo ao painel de controle!
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $quantidadeClientes }}</h3>
                        <p>Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $quantidadeMensagens }}</h3>
                        <p>Mensagens Recebidas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <a href="{{ route('mensagens.index') }}" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
    <!-- Adicione seu CSS personalizado aqui -->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
