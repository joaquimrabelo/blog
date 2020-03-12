@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            @if (session('status_message'))
                @php
                    $status_message = Session('status_message');
                @endphp
                <div class="alert alert-{{ $status_message['type'] }}" role="alert">
                    {{ $status_message['msg'] }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Lista de posts ({{ $posts->total() }})</div>
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Slug</th>
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
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->autor->name }}</td>
                                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $arrStatus[$post->status] }}</td>
                                    <td>
                                        <form action="{{ route('painel-delete-post') }}" method="post">
                                            <a href="{{ route('painel-post', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
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
