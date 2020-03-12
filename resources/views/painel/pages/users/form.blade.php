@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (isset($user))
                        Editar usuário
                    @else
                        Adicionar novo usuário
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('painel-save-user') }}">
                        @csrf
                        @if (isset($user) && $user->id)
                            <input type="hidden" name="id" value="{{ $user->id }}">
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-12 col-md-4 col-form-label text-md-right">Nome:</label>
                            <div class="col-12 col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user) ? $user->name : old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-12 col-md-4 col-form-label text-md-right">E-mail:</label>

                            <div class="col-12 col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-12 col-md-4 col-form-label text-md-right">Senha:</label>

                            <div class="col-12 col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-12 col-md-4 col-form-label text-md-right">Confirme a senha:</label>

                            <div class="col-12 col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-md-4 col-form-label text-md-right">Grupo de acesso:</label>

                            <div class="col-12 col-md-8">
                                @foreach ($arrGroups as $group)
                                    <p>
                                        <input type="checkbox" id="group-{{$group->id}}" name="groups[]" value="{{$group->id}}" {{ isset($user) && $user->groups->contains('id', $group->id) ? 'checked' : '' }}>
                                        <label for="group-{{$group->id}}">{{$group->nome}} - {{$group->descricao}}</label>
                                    </p>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12 col-md-8 offset-md-4">
                                <a href="{{ route('painel-users') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
