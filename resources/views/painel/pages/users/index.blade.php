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
                <div class="card-header">Lista de usuário ({{ $users->total() }})</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Grupos</th>
                                <th>Data criação</th>
                                <th>Data atualização</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->groups->count())
                                            @php
                                                $groups = [];
                                                foreach ($user->groups as $group) {
                                                    $groups[] = $group->nome;
                                                }
                                            @endphp
                                            {{ implode(', ', $groups) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('painel-delete-user') }}" method="post">
                                            <a href="{{ route('painel-user', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
