@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gerenciar Formulários de Avaliação</h1>
@stop

@section('content')

<div class="col-md-10 offset-md-1 dashboard-avs-container">
    @if(count($formularios) > 0)

    <table id="tabela" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formularios as $formulario)
            <tr>
                <td>{{$formulario->id}}</td>
                <td>{{$formulario->descricao}}</td>
                <td>
                    <a href="{{ url("/formularios-avaliacao/edit/".$formulario->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ url("/formularios-avaliacao/".$formulario->id) }}" method="POST">
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
    <p>Você ainda não tem formulários de avaliação, <a href="{{ url("/formularios-avaliacao/create") }}">Criar novo formulário de avaliação</a></p>
    @endif
    <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/formularios-avaliacao/create") }}">Criar novo formulário de avaliação</a>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready( function () {
            if("{{ session('success') }}" == "Formulário de avaliação criado com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Formulário de avaliação atualizado com sucesso!"){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Formulário de avaliação removido com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
        } );
    </script>
@stop
