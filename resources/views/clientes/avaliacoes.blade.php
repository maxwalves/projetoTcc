@extends('adminlte::page')

@section('title', 'Gerenciar Avaliações de Clientes')

@section('content_header')
    <h1>Gerenciar Avaliações de Clientes</h1>
@stop

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-avs-container">

        <a href="{{ route('clientes.index') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>

        @if (count($avaliacoes) > 0)

            <table id="tabela" class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Formulário de Avaliação</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($avaliacoes as $avaliacao)
                        <tr>
                            <td>{{ $avaliacao->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($avaliacao->data)) }}</td>
                            <td>{{ $avaliacao->cliente->nome }}</td>
                            <td>{{ $avaliacao->formularioAvaliacao->descricao }}</td>
                            <td>{{ $avaliacao->status }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ url('/avaliacoes-cliente/' . $avaliacao->cliente->id . '/'. $avaliacao->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    <form action="{{ url("/clientes/avaliacoes/".$avaliacao->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <a href="{{ url('/clientes/enviarAvaliacao/'.$avaliacao->cliente->id.'/'.$avaliacao->id) }}" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i></a>
                                </div>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem avaliações de clientes, <a href="{{ url('/clientes/createAvaliacaoCliente/'.$cliente->id) }}">Criar nova
                    avaliação de cliente</a></p>
        @endif
        <div class="row">
            <div class="col-12 col-xl-4">
                <a class="btn btn-success btn-lg" href="{{ url('/clientes/createAvaliacaoCliente/'.$cliente->id) }}">Criar nova avaliação de
                    cliente</a>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            if ("{{ session('success') }}" == "Avaliação de cliente criada com sucesso.") {
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            } else if ("{{ session('success') }}" == "Avaliação de cliente atualizada com sucesso!") {
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            } else if ("{{ session('success') }}" == "Avaliação de cliente removida com sucesso.") {
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
        });
    </script>
@stop
