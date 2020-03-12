<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-header">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website-home') }}">Meu Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('website-home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                <a class="dropdown-item" href="{{ route('website-category', $category->slug) }}">{{ $category->nome }}</a>
                @endforeach
            </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route('website-home') }}" method="GET">
            <input class="form-control mr-sm-2" type="search" name="busca" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        </div>
    </div>
  </nav>