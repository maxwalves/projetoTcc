@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editando: {{ $usuarioEditar->name }}</h1>
@stop

@section('content')
    
    <div id="av-create-container" class="col-md-6 offset-md-3">
        

        <form action="/users/update/{{ $usuarioEditar->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id" class="control-label">Id</label>
                <div class="input-group">
                    <input type="text" class="form-control" disabled="true"
                    name="id" id="id" placeholder="Id" value="{{$usuarioEditar->id}}">
                </div>
            
            </div>

            <div class="form-group">
                <label for="name" class="control-label">Nome</label>
                <div class="input-group">
                    <input type="text" class="form-control" disabled="true"
                    name="name" id="name" placeholder="Nome" value="{{$usuarioEditar->name}}">
                </div>

            </div>

            <div class="form-group">
                <label for="username" class="control-label">Email</label>
                <input type="text" class="form-control" disabled="true"
                name="username" id="username" placeholder="Email" value="{{$usuarioEditar->username}}">

            </div>

            <div class="divider"></div> 
            <div style="border-bottom: 2px; border-color: black">
                <p><strong>Perfis que usuário possui:</strong> </p>
                
                @if ($dados["permission1"] == 'true')
                    <a href="{{ url("/users/editPerfil/".$usuarioEditar->id."/desativarAdmin") }}" class="btn btn-active btn-primary" id="btAdminPossui">Admin</a> 
                @endif
                
            </div>
            <div class="divider"></div> 
            <div>
                <p><strong>Perfis disponíveis no sistema:</strong></p>
                <p>Clique para adicionar.</p>
                @if ($dados["permission1"] == 'false')  
                    <a href="{{ url("/users/editPerfil/".$usuarioEditar->id."/ativarAdmin") }}" class="btn btn-active btn-secondary" id="btAdminDisponivel">Admin</a>
                @endif
                
            </div>
            <div class="divider"></div> 

        </form>

    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
