@extends('adminlte::page')

@section('title', 'Gerenciar Respostas')

@section('content_header')
    <h1>Gerenciar Respostas</h1>
@stop

@section('content')

<div class="col-md-10 offset-md-1 dashboard-avs-container">
    @if(count($respostas) > 0)

    <table id="tabela" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Data</th>
                <th>Campo</th>
                <th>Avaliação do Cliente</th>
                <th>Resposta</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($respostas as $resposta)
            <tr>
                <td>{{ $resposta->data }}</td>
                <td>{{ $resposta->campo->pergunta }}</td>
                <td>{{ $resposta->avaliacaoCliente->cliente->nome }}</td>
                <td>{{ $resposta->resposta }}</td>
                <td>
                    <a href="{{ url("/respostas/edit/".$resposta->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ url("/respostas/".$resposta->id) }}" method="POST" style="display:inline-block;">
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
    <p>Você ainda não tem respostas, <a href="{{ url("/respostas/create") }}">Criar nova resposta</a></p>
    @endif
    <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/respostas/create") }}">Criar nova resposta</a>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready( function () {
            if("{{ session('success') }}" == "Resposta criada com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Resposta atualizada com sucesso!"){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Resposta removida com sucesso."){
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
                    "search": "Procure uma resposta: "
                }
            });
        } );
    </script>
@stop
