<h3>Categorias</h3>
<nav class="nav flex-column">
    @foreach ($categories as $item)
        <a class="nav-link {{ isset($category) && $category->id == $item->id ? 'active' : '' }}" href="{{ route('website-category', $item->slug)}}">{{ $item->nome}}</a>
    @endforeach
</nav>