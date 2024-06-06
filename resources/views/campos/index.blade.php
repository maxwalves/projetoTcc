@extends('adminlte::page')

@section('title', 'Gerenciar Campos')

@section('content_header')
    <h1>Gerenciar Campos</h1>
@stop

@section('content')

<div class="col-md-10 offset-md-1 dashboard-avs-container">
    @if(count($campos) > 0)

    <table id="tabela" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Pergunta</th>
                <th>Formulário de Avaliação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campos as $campo)
            <tr>
                <td>{{$campo->id}}</td>
                <td>{{$campo->pergunta}}</td>
                <td>{{$campo->formularioAvaliacao->descricao}}</td>
                <td>
                    <a href="{{ url("/campos/edit/".$campo->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ url("/campos/".$campo->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem campos, <a href="{{ url("/campos/create") }}">Criar novo campo</a></p>
    @endif
    <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/campos/create") }}">Criar novo campo</a>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready( function () {
            if("{{ session('success') }}" == "Campo criado com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Campo atualizado com sucesso!"){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Campo removido com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
        } );
    </script>
@stop
