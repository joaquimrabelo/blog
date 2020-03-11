@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (isset($category))
                        Editar categoria
                    @else
                        Adicionar nova categoria
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('painel-save-category') }}">
                        @csrf
                        @if (isset($category) && $category->id)
                            <input type="hidden" name="id" value="{{ $category->id }}">
                        @endif
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-8">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ isset($category) ? $category->nome : old('nome') }}" autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('painel-categories') }}" class="btn btn-secondary">Cancelar</a>
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
