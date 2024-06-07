@extends('adminlte::page')

@section('title', 'Setores')

@section('content_header')
    <h1>Gerenciar Setores</h1>
@stop

@section('content')

<div class="col-md-10 offset-md-1 dashboard-avs-container">
    @if(count($setores) > 0)

    <table id="tabela" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome do Setor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($setores as $setor)
            <tr>
                <td>{{ $setor->id }}</td>
                <td>{{ $setor->nomeSetor }}</td>
                <td>
                    <a href="{{ url("/setores/edit/".$setor->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <a href="{{ url("/clientesSetor/".$setor->id) }}" class="btn btn-primary btn-sm">Listar Clientes</a>
                    <form action="{{ url("/setores/".$setor->id) }}" method="POST" style="display:inline-block;">
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
    <p>Você ainda não tem setores cadastrados, <a href="{{ url("/setores/create") }}">Criar novo setor</a></p>
    @endif
    <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/setores/create") }}">Criar novo setor</a>
        </div>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
    <script>
        $(document).ready( function () {
            if("{{ session('success') }}" == "Setor criado com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Setor atualizado com sucesso!"){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Setor removido com sucesso."){
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
                    "search": "Procure um setor: "
                }
            });
        } );
    </script>
@stop
