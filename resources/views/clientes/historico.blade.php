@extends('adminlte::page')

@section('title', 'Gerenciar Histórico')

@section('content_header')
    <h1>Gerenciar Histórico</h1>
@stop

@section('content')

<div class="col-md-10 offset-md-1 dashboard-avs-container">

    <a href="{{ route('clientes.index') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>

    @if(count($historicos) > 0)

    <table id="tabela" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Data</th>
                <th>Cliente</th>
                <th>Tipo de Registro</th>
                <th>Anexo</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historicos as $historico)
            <tr>
                <td>{{ $historico->data }}</td>
                <td>{{ $historico->cliente->nome }}</td>
                <td>{{ $historico->tipoRegistro }}</td>
                <td>
                    @if($historico->anexo)
                        <a href="{{ url('uploads/'.$historico->anexo) }}" target="_blank">Ver Anexo</a>
                    @else
                        Nenhum
                    @endif
                </td>
                <td>{{ $historico->descricao }}</td>
                <td>
                    <a href="{{ url("/historicos/edit/".$historico->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ url("/historicos/".$historico->id) }}" method="POST" style="display:inline-block;">
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
    <p>Você ainda não tem históricos, <a href="{{ url("/historicos/create") }}">Criar novo histórico</a></p>
    @endif
    <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/historicos/create") }}">Criar novo histórico</a>
        </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready( function () {
            if("{{ session('success') }}" == "Histórico criado com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Histórico atualizado com sucesso!"){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Histórico removido com sucesso."){
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
                    "search": "Procure um histórico: "
                }
            });
        } );
    </script>
@stop
