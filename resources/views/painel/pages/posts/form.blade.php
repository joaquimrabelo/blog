@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (isset($post))
                        Editar post
                    @else
                        Adicionar novo post
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('painel-save-post') }}"  enctype="multipart/form-data">
                        @csrf
                        @if (isset($post) && $post->id)
                            <input type="hidden" name="id" value="{{ $post->id }}">
                        @endif
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Título:</label>
                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ isset($post) ? $post->title : old('title') }}" autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagem" class="col-md-4 col-form-label text-md-right">Imagem:</label>
                            <div class="col-md-8">
                                <input id="imagem" type="file" accept="image/*" class="form-control-file @error('imagem') is-invalid @enderror" name="imagem" value="{{ isset($post) ? $post->imagem : old('imagem') }}" autocomplete="imagem" autofocus>
                                @error('imagem')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resumo" class="col-md-4 col-form-label text-md-right">Resumo:</label>
                            <div class="col-md-8">
                                <textarea id="resumo" class="form-control @error('resumo') is-invalid @enderror" name="resumo" autocomplete="resumo" autofocus>{{ isset($post) ? $post->resumo : old('resumo') }}</textarea>
                                @error('resumo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="texto" class="col-md-4 col-form-label text-md-right">Texto:</label>
                            <div class="col-md-8">
                                <textarea id="texto" class="form-control @error('texto') is-invalid @enderror" name="texto" autocomplete="texto" autofocus>{{ isset($post) ? $post->texto : old('texto') }}</textarea>
                                @error('texto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status:</label>
                            <div class="col-md-8">
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    @foreach ($arrStatus as $key => $value)
                                        <option {{ (isset($post) && $post->status == $key) || old('status') == $key  ? 'selected="selected"' : '' }} value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('painel-posts') }}" class="btn btn-secondary">Cancelar</a>
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
