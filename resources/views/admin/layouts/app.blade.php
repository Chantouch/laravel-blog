<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster'),
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <title>{{ config('app.name', 'My Blog') }}</title>

    <!-- Styles -->
    <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/admin.css') !!}" rel="stylesheet">
    @yield('css')
</head>
<body class="admin-body">
<div id="app">
    @include('shared/navbar')
    <div class="container-fluid">
        <div class="row d-flex d-md-block flex-nowrap wrapper">
            <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
                @include('admin/shared/sidebar')
            </div>
            <main class="col-md-10 float-left col px-5 pl-md-4 pt-2 main mb-3">
                @include('shared/alerts')

                @yield('content')
            </main>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{!! asset('js/app.js') !!}"></script>
<script src="{!! asset('js/admin.js') !!}"></script>
@yield('js')
</body>
</html>
