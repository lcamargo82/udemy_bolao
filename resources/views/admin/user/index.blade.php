@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @breadcrumb_component(['page' => $page, 'items' => $breadcrumb ?? []])
                @endbreadcrumb_component
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @alert_component(['msg' => session('msg'), 'status' => session('status')])
                        @endalert_component

                        <form class="form-inline" method="GET" action="{{ route($routeName.'.index') }}">
                            <div class="form-group mb-2">
                                <a class="btn btn-info" href="#">Add</a>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" class="form-control" name="search" placeholder="Buscar" value="{{ $search }}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                            <a class="btn btn-warning mb-2" href="{{ route($routeName.'.index') }}">Limpar</a>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    @foreach($columnList as $value)
                                        <th scope="col">{{ $value }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $chave => $user)
                                    <tr>
                                        <!-- Deixando a tabela mais dinamica onde a variavel columnList
                                        recebe um array na classe de usuario controller definindo as colunas -->
                                        @foreach($columnList as $key => $value)
                                            @if( $key == 'id')
                                                <th scope="row">@php echo $user->{$key} @endphp</th>
                                            @else
                                                <td>@php echo $user->{$key} @endphp</td>
                                            @endif
                                        @endforeach
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
