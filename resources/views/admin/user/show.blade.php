@extends('layouts.app')

@section('content')
    @page_component(['col' => 8, 'page' => $page])

        @breadcrumb_component(['page' => $page, 'items' => $breadcrumb ?? []])
        @endbreadcrumb_component

        @alert_component(['msg' => session('msg'), 'status' => session('status')])
        @endalert_component

        <p>Nome: {{ $register->name }}</p>
        <p>E-mail: {{ $register->email }}</p>

        @if($delete)
            @form_component(['action' => route($routeName.'.destroy', $register->id), 'method' => 'DELETE'])
                <button class="btn btn-danger btn-lg">Deletar</button>
            @endform_component
        @endif

    @endpage_component
@endsection
