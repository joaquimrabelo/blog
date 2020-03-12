<nav class="navbar navbar-expand-lg navbar-blog">
    <div class="container">
      <div class="collapse navbar-collapse " id="navbar-blog">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ $menuAtivo == 'home' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('painel-home') }}"><i class="fa fa-tachometer"></i> Home</a>
          </li>
          <li class="nav-item dropdown  {{ $menuAtivo == 'categories' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="nav-categorias" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-list"></i> Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="nav-categorias">
              <a class="dropdown-item" href="{{ route('painel-categories') }}"><i class="fa fa-list"></i> Ver todas</a>
              <a class="dropdown-item" href="{{ route('painel-add-category') }}"><i class="fa fa-plus"></i> Adicionar nova</a>
            </div>
          </li>
          <li class="nav-item dropdown  {{ $menuAtivo == 'posts' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="nav-posts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-newspaper-o"></i> Posts
            </a>
            <div class="dropdown-menu" aria-labelledby="nav-posts">
              <a class="dropdown-item" href="{{ route('painel-posts') }}"><i class="fa fa-newspaper-o"></i> Ver todos</a>
              <a class="dropdown-item" href="{{ route('painel-add-post') }}"><i class="fa fa-plus"></i> Adicionar novo</a>
            </div>
          </li>
          <li class="nav-item dropdown  {{ $menuAtivo == 'config' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="nav-config" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i> Configurações
            </a>
            <div class="dropdown-menu" aria-labelledby="nav-config">
              <a class="dropdown-item" href="{{ route('painel-users') }}"><i class="fa fa-group"></i> Usuários</a>
              <a class="dropdown-item" href="{{ route('painel-add-user') }}"><i class="fa fa-plus"></i> Adicionar usuário</a>
              <a class="dropdown-item" href="{{ route('painel-groups') }}"><i class="fa fa-list"></i> Grupos de acesso</a>
              <a class="dropdown-item" href="{{ route('painel-add-group') }}"><i class="fa fa-plus"></i> Adicionar grupo</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('website-home') }}" target="_blank"><i class="fa fa-external-link"></i> Ver site</a>
          </li>
        </ul>
      </div>
    </div>
</nav>