@extends('layouts.app')

@section('content')
    @page_component(['col' => 8, 'page' => $page])

        @breadcrumb_component(['page' => $page, 'items' => $breadcrumb ?? []])
        @endbreadcrumb_component

        @alert_component(['msg' => session('msg'), 'status' => session('status')])
        @endalert_component

        @form_component(['action' => route($routeName.'.update', $register->id), 'method' => 'PUT'])
            @include('admin.user.form')

            <button class="btn btn-primary btn-lg float-right">Editar</button>
        @endform_component

    @endpage_component
@endsection
