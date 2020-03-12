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
                <div class="card-header">Lista de grupos de acesso ({{ $groups->total() }})</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Data criação</th>
                                <th>Data atualização</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->nome }}</td>
                                    <td>{{ $group->descricao }}</td>
                                    <td>{{ $group->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $group->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('painel-delete-group') }}" method="post">
                                            <a href="{{ route('painel-group', $group->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $group->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $groups->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
