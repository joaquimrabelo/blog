@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de posts ({{ $posts->total() }})</div>
                <div class="card-body">
                    <table class="table table-striped">
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
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
