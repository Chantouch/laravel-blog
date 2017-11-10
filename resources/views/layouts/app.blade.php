<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth
    <script>
        window.Laravel = {!! json_encode([
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster')
        ]) !!};
    </script>

    <title>{{ MetaTag::get('title') }}</title>

    {!! MetaTag::tag('robots') !!}

    {!! MetaTag::tag('site_name', 'My Blog') !!}
    {!! MetaTag::tag('url', Request::url()); !!}
    {!! MetaTag::tag('locale', 'en_EN') !!}

    {!! MetaTag::tag('description') !!}
    {!! MetaTag::tag('image') !!}

    {!! MetaTag::openGraph() !!}

    {!! MetaTag::twitterCard() !!}

    {{--Set default share picture after custom section pictures--}}
    {!! MetaTag::tag('image', asset('storage/images/default-logo.png')) !!}

    <!-- Styles -->
    <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
</head>
<body class="bg-light">
<div id="app">
    @include('shared/navbar')

    <div class="container {{ (Request::is('/') || Request::is('posts/*') || Request::is('login') || Request::is('register')) ? '' : 'bg-white' }}">
        @include('shared/alerts')

        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

    <nav class="navbar navbar-dark bg-dark fixed-bottom">
        <div class="container">
            @yield('footer')
            @include('shared/newsletter-form')
        </div>
    </nav>
</div>

<!-- Scripts -->
<script src="{!! asset('js/app.js') !!}"></script>
@stack('inline-scripts')
</body>
</html>
