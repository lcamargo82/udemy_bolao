@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form class="form-inline" method="GET" action="{{ route('users.index') }}">
                                <div class="form-group mb-2">
                                    <a class="btn btn-info" href="#">Add</a>
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="search" class="form-control" name="search" placeholder="Buscar" value="{{ $search }}">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                                <a class="btn btn-warning mb-2" href="{{ route('users.index') }}">Limpar</a>
                            </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(!$search && $users)
                            {{ $users->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
