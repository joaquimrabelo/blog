@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (isset($group))
                        Editar grupo de acesso
                    @else
                        Adicionar novo grupo de acesso
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('painel-save-group') }}"  enctype="multipart/form-data">
                        @csrf
                        @if (isset($group) && $group->id)
                            <input type="hidden" name="id" value="{{ $group->id }}">
                        @endif
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome:</label>
                            <div class="col-md-8">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ isset($group) ? $group->nome : old('nome') }}" autocomplete="nome" autofocus>
                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição:</label>
                            <div class="col-md-8">
                                <textarea id="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" autocomplete="descricao" autofocus>{{ isset($group) ? $group->descricao : old('descricao') }}</textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Permissões de acesso:</label>

                            <div class="col-md-8">
                                @foreach ($arrPermissions as $permission)
                                    <p>
                                        <input type="checkbox" id="permission-{{$permission->id}}" name="permissions[]" value="{{$permission->id}}" {{ isset($group) && $group->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                                        <label for="permission-{{$permission->id}}">{{$permission->nome}} - {{$permission->descricao}}</label>
                                    </p>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('painel-groups') }}" class="btn btn-secondary">Cancelar</a>
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
