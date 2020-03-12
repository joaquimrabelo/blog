@extends('website.layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-12 col-sm-9">
           <div class="card mt-4">
               <div class="card-body">
                <h1 class="titulo-post">{{$post->title}}</h1>
                @php
                    $post_cat = [];
                    foreach ($post->categories as $cat) {
                        $post_cat[] = $cat->nome;
                    }
                @endphp
                <p class="small">{{ implode(', ', $post_cat) }}</p>
                <img class="img-fluid" src="{{Storage::url('posts/' . $post->imagem)}}" alt="{{$post->title}}">
                <div class="mt-2">
                 {!! $post->texto !!}
                </div>
                <hr>
                <p class="mt-2 small">
                    Publicado por: {{ $post->autor->name }} em {{ $post->created_at->format('d/m/Y H:i')}}
                </p>
               </div>
           </div>
        </div>
        <div class="col-12 col-sm-3 navbar-right">
            @include('website.partials.right-nav')
        </div>
    </div>
@endsection