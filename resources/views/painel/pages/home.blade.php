@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Categorias</div>
                <div class="card-body">
                   {{ $totalCategories }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body">
                   {{ $totalPosts }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Usuários</div>
                <div class="card-body">
                   {{ $totalUsers }}
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">Últimos posts cadastrados</div>
                <div class="card-body">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Data criação</th>
                                <th>Data atualização</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->autor->name }}</td>
                                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $arrStatus[$post->status] }}</td>
                                    <td>
                                        <a href="{{ route('painel-post', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
