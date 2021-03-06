@extends('layouts.app')

@section('content')
    @page_component(['col' => 8, 'page' => $page])

        @breadcrumb_component(['page' => $page, 'items' => $breadcrumb ?? []])
        @endbreadcrumb_component

        @alert_component(['msg' => session('msg'), 'status' => session('status')])
        @endalert_component

        @search_component(['routeName' => $routeName, 'search' => $search])
        @endsearch_component

        @table_component(['columnList' => $columnList, 'users' => $users, 'routeName' => $routeName])
        @endtable_component

        @paginate_component(['search' => $search, 'users' => $users])
        @endpaginate_component

    @endpage_component
@endsection
