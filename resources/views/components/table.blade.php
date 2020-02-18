<table class="table">
    <thead>
    <tr>
        @foreach($columnList as $value)
            <th scope="col">{{ $value }}</th>
        @endforeach
        <th scope="col">Ação</th>
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
            <td>
                <a href="{{ route($routeName.'.show', $user->id) }}">
                    <i style="color: black" class="material-icons">
                        pageview
                    </i>
                </a>
                <a href="{{ route($routeName.'.edit', $user->id) }}">
                    <i style="color: orange" class="material-icons">
                        create
                    </i>
                </a>
                <a href="{{ route($routeName.'.show', [$user->id, 'delete=1']) }}">
                    <i style="color: red" class="material-icons">
                        delete
                    </i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
