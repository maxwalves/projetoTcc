@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Gerenciar Clientes</h1>
@stop

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-avs-container">
        @if (count($clientes) > 0)

            <table id="minhaTabela" class="table table-striped table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Data de criação</th>
                        <th>Usuário vinculado atual</th>
                        <th>Setor vinculado atual</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>{{ date('d/m/Y', strtotime($cliente->dataCriacao)) }}</td>
                            <td>{{ $cliente->usuario->name }}</td>
                            <td>{{ $cliente->setor->nomeSetor }}</td>
                            <td>
                                <a href="{{ url('/clientes/edit/' . $cliente->id) }}"
                                    class="btn btn-success btn-sm">Editar</a>
                                <form action="{{ url('/clientes/' . $cliente->id) }}" method="POST">
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
            <p>Você ainda não tem clientes cadastrados, <a href="{{ url('/clientes/create') }}">Criar novo cliente</a></p>
        @endif
        <div class="row">
            <div class="col-12 col-xl-4">
                <a class="btn btn-success btn-lg" href="{{ url('/clientes/create') }}">Criar novo cliente</a>
            </div>
        </div>
    </div>

@stop

@section('css')
   
@stop

@section('js')

    <script type="text/javascript">
        $(document).ready(function() {
            if ("{{ session('success') }}" == "Cliente criado com sucesso.") {
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            } else if ("{{ session('success') }}" == "Cliente atualizado com sucesso!") {
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            } else if ("{{ session('success') }}" == "Cliente removido com sucesso.") {
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }

            const table = $('#minhaTabela').DataTable({
                scrollX: true,
                pageLength: 20,
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado _TOTAL_ de _MAX_ registros no total)",
                    "search": "Procure um cliente: "
                }
            });
        });
    </script>
@stop
