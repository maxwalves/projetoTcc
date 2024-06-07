@extends('adminlte::page')

@section('title', 'Gerenciar Avaliações de Clientes')

@section('content_header')
    <h1>Gerenciar Avaliações de Clientes</h1>
@stop

@section('content')

<div class="col-md-10 offset-md-1 dashboard-avs-container">
    @if(count($avaliacoes) > 0)

    <table id="tabela" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Formulário de Avaliação</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($avaliacoes as $avaliacao)
            <tr>
                <td>{{$avaliacao->id}}</td>
                <td>{{$avaliacao->data}}</td>
                <td>{{$avaliacao->cliente->nome}}</td>
                <td>{{$avaliacao->formularioAvaliacao->descricao}}</td>
                <td>{{$avaliacao->status}}</td>
                <td>
                    <a href="{{ url("/avaliacoes-cliente/edit/".$avaliacao->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ url("/avaliacoes-cliente/".$avaliacao->id) }}" method="POST">
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
    <p>Você ainda não tem avaliações de clientes, <a href="{{ url("/avaliacoes-cliente/create") }}">Criar nova avaliação de cliente</a></p>
    @endif
    <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/avaliacoes-cliente/create") }}">Criar nova avaliação de cliente</a>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready( function () {
            if("{{ session('success') }}" == "Avaliação de cliente criada com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Avaliação de cliente atualizada com sucesso!"){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Avaliação de cliente removida com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }

            const table = $('#tabela').DataTable({
                scrollX: true,
                pageLength: 20,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado _TOTAL_ de _MAX_ registros no total)",
                    "search": "Procure uma avaliação: "
                }
            });
        } );
    </script>
@stop
