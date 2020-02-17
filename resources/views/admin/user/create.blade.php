@extends('layouts.app')

@section('content')
    @page_component(['col' => 8, 'page' => $page])

        @breadcrumb_component(['page' => $page, 'items' => $breadcrumb ?? []])
        @endbreadcrumb_component

        @alert_component(['msg' => session('msg'), 'status' => session('status')])
        @endalert_component

        @form_component(['action' => route($routeName.'.store'), 'method' => 'POST'])
            @include('admin.user.form')

            <button class="btn btn-primary btn-lg float-right">Adicionar</button>
        @endform_component

    @endpage_component
@endsection
