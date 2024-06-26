@extends('adminlte::page')

@section('title', 'Cadastrar novo usuário')

@section('content_header')
    <h1>Cadastrar novo usuário!</h1>
@stop

@section('content')
<div id="av-create-container" class="col-md-6 offset-md-3">
    <form action="/users" method="POST" enctype="multipart/form-data">
        @csrf

        <a href="{{ route('users.users') }}" class="btn btn-warning">Voltar</a>

        <div class="form-group">
            <label for="name" class="control-label">Nome</label>
            <div class="input-group">
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' :''}}" 
                name="name" id="name" placeholder="Nome">
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
            name="email" id="email" placeholder="Email">

            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <x-label for="password" value="{{ __('Senha') }}" />
            <x-input id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' :''}}" 
                type="password" name="password" required autocomplete="new-password" />

            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <x-label for="password_confirmation" value="{{ __('Confirme a senha') }}" />
            <x-input id="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' :''}}" 
                type="password" name="password_confirmation" required autocomplete="new-password" />

            @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="setor_id" class="control-label">Setor</label>
            <select class="form-control {{ $errors->has('setor_id') ? 'is-invalid' : '' }}" name="setor_id" id="setor_id" required>
                <option value="">Selecione um setor</option>
                @foreach($setores as $setor)
                    <option value="{{ $setor->id }}">{{ $setor->nomeSetor }}</option>
                @endforeach
            </select>

            @if ($errors->has('setor_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('setor_id') }}
                </div>
            @endif
        </div>

        <div id="btSalvarUsuario">
            <input style="font-size: 16px" type="submit" class="btn btn-primary btn-lg" value="Cadastrar usuário!">
        </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
