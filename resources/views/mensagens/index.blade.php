@extends('adminlte::page')

@section('title', 'Mensagens')

@section('content_header')
    <h1>Gerenciar Mensagens</h1>
@stop

@section('content')

<div class="col-md-10 offset-md-1 dashboard-avs-container">
    @if(count($mensagens) > 0)

    <table id="tabela" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Assunto</th>
                <th>Conteúdo</th>
                <th>Setor</th>
                <th>Data de criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mensagens as $mensagem)
            <tr>
                <td>{{ $mensagem->nome }}</td>
                <td>{{ $mensagem->email }}</td>
                <td>{{ $mensagem->assunto }}</td>
                <td>{{ $mensagem->conteudo }}</td>
                <td>{{ $mensagem->setor ? $mensagem->setor->nomeSetor : 'Sem setor' }}</td>
                <td>{{ date('d/m/Y', strtotime($mensagem->created_at)) }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ url("/mensagens/".$mensagem->id) }}" class="btn btn-primary btn-sm">Detalhes</a>
                        {{-- <a href="{{ url("/mensagens/edit/".$mensagem->id) }}" class="btn btn-success btn-sm">Editar</a> --}}
                        <form action="{{ url("/mensagens/".$mensagem->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem mensagens, <a href="{{ url("/mensagens/create") }}">Criar nova mensagem</a></p>
    @endif
    {{-- <div class="row">
        <div class="col-12 col-xl-4">
            <a class="btn btn-success btn-lg" href="{{ url("/mensagens/create") }}">Criar nova mensagem</a>
        </div>
    </div> --}}
</div>

@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready( function () {
            if("{{ session('success') }}" == "Mensagem criada com sucesso."){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Mensagem atualizada com sucesso!"){
                Swal.fire(
                    'Sucesso!',
                    "{{ session('success') }}",
                    'success'
                )
            }
            else if("{{ session('success') }}" == "Mensagem removida com sucesso."){
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
                    "search": "Procure uma mensagem: "
                }
            });
        } );
    </script>
@stop
