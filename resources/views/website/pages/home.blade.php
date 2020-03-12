@extends('website.layouts.master')

@section('content')
    
    @if (!isset($category) && isset($destaques))
        @include('website.pages.destaque-home')
    @endif
    <div class="row">
        <div class="col-12 col-sm-9">
            @if (isset($category) && $category)
               <h1 class="titulo-categoria">{{ $category->nome }}</h1>
            @endif
            @forelse ($posts as $post)
                @include('website.partials.card-post', ['class_img' => 'col-sm-4', 'class_text' => 'col-sm-8'])
            @empty
                <h3 class="mt-2">Não há mais posts para exibir!</h3>
            @endforelse
            @if ($posts->count())
                <div class="mt-3">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
        <div class="col-12 col-sm-3 navbar-right">
            @include('website.partials.right-nav')
        </div>
    </div>
@endsection