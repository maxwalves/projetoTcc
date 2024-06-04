@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    <div id="av-create-container" class="col-md-6 offset-md-3">
        <h2>Editando: {{ $usuarioEditado->name }}</h2>
        <form action="/users/update/{{ $usuarioEditado->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id" class="control-label">Id</label>
                <div class="input-group">
                    <input type="text" class="form-control" disabled="true"
                    name="id" id="id" placeholder="Id" value="{{$usuarioEditado->id}}">
                </div>
            
            </div>

            <div class="form-group">
                <label for="name" class="control-label">Nome</label>
                <div class="input-group">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' :''}}" 
                    name="name" id="name" placeholder="Nome" value="{{$usuarioEditado->name}}">
                </div>

                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' :''}}" 
                name="email" id="email" placeholder="Email" value="{{$usuarioEditado->email}}">

                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' :''}}" 
                    type="password" name="password"/>

                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <x-label for="password_confirmation" value="{{ __('Confirme a senha') }}" />
                <x-input id="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' :''}}" 
                    type="password" name="password_confirmation"/>

                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>


            <input type="submit" class="btn btn-primary" value="Salvar">

        </form>

    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop