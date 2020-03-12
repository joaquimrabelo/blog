<div class="card mt-3">
    <div class="card-body">
        <div class="row">
            <div class="col-12 {{ $class_img }}">
                <img src="{{ Storage::url('posts/' . $post->imagem)}}" class="img-fluid mr-3" alt="{{ $post->title }}">
            </div>
            <div class="col-12 {{ $class_text }}">
                <h5 class="mt-0">{{ $post->title }}</h5>
                @php
                    $post_cat = [];
                    foreach ($post->categories as $cat) {
                        $post_cat[] = $cat->nome;
                    }
                @endphp
                <p class="small">{{ implode(', ', $post_cat) }}</p>
                <p>
                    {{ substr($post->resumo, 0, 100) }}
                    <a href="{{ route('website-post', $post->slug) }}" class="btn-link">Ler mais</a>
                </p>
                <p class="mt-2 small">
                    Publicado por: {{ $post->autor->name }} em {{ $post->created_at->format('d/m/Y H:i')}}
                </p>
                @can('edit-post', $post)
                    <a href="{{ route('painel-post', $post->id) }}" class="btn btn-sm btn-primary">Editar</a>
                @endcan
                @can('delete-post', $post)
                    <form action="{{ route('painel-delete-post') }}" method="post" class="form-delete">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>