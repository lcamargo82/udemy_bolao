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
