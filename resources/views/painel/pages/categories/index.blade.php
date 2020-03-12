@extends('painel.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status_message'))
                @php
                    $status_message = Session('status_message');
                @endphp
                <div class="alert alert-{{ $status_message['type'] }}" role="alert">
                    {{ $status_message['msg'] }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Lista de categorias ({{ $categories->total() }})</div>
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->nome }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <form action="{{ route('painel-delete-category') }}" method="post">
                                            <a href="{{ route('painel-category', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
