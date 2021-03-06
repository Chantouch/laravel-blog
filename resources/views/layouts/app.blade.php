<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <title>{{ MetaTag::get('title') }} - {{ config('app.name', 'BCodinger') }}</title>

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

    {!! MetaTag::tag('robots') !!}

    {!! MetaTag::tag('site_name', 'BCodinger') !!}
    {!! MetaTag::tag('url', Request::url()); !!}
    {!! MetaTag::tag('locale', 'en_EN') !!}

    {!! MetaTag::tag('description') !!}
    {!! MetaTag::tag('image') !!}

    {!! MetaTag::openGraph() !!}

    {!! MetaTag::twitterCard() !!}

    {!! MetaTag::tag('image', asset('images/example-logo.png')) !!}

    <link href="{!! asset('css/app.css') !!}" rel="preload"  as="style" onload="this.rel='stylesheet'">
    <meta name="google-site-verification" content="czpAh0wrDqGHOiiBWborRdEMjq6S580nxv73uIuAagQ" />
    {{--<script>--}}
        {{--(function(w) {--}}
            {{--'use strict';--}}
            {{--var xhrRunner = {--}}
                {{--firstRun: true--}}
            {{--};--}}
            {{--xhrRunner.getAsyncFile = function(fileStr) {--}}
                {{--var xhr = new XMLHttpRequest();--}}
                {{--xhr.timeout = 4000;--}}
                {{--xhr.overrideMimeType('text/css; charset=UTF-8');--}}
                {{--xhr.onreadystatechange = function() {--}}
                    {{--if (xhr.readyState === 4 && xhr.status === 200) {--}}
                        {{--var style = document.createElement('style'),--}}
                            {{--head = document.getElementsByTagName('head')[0];--}}
                        {{--style.appendChild(document.createTextNode(xhr.responseText));--}}
                        {{--head.appendChild(style);--}}
                    {{--}--}}
                {{--};--}}
                {{--xhr.open('GET', fileStr, true);--}}
                {{--xhr.send(null);--}}
            {{--};--}}
            {{--if (xhrRunner.firstRun) {--}}
                {{--xhrRunner.getAsyncFile('/css/app.css');--}}
                {{--xhrRunner.firstRun = false;--}}
            {{--}--}}
            {{--w.xhrRunner = xhrRunner;--}}
        {{--}(window));--}}
    {{--</script>--}}

    @stack('css')

    <script>
        window.ga = window.ga || function () {
            (ga.q = ga.q || []).push(arguments)
        };
        ga.l = +new Date;
        ga('create', 'UA-51288724-4', 'auto');
        ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-51288724-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-51288724-4');

    </script>
</head>
<body class="bg-light">
<div id="app">
    <div class="container-fluid">
        <div class="text-center">
            <a href="{!! route('home') !!}">
                <img src="{!! asset('images/example-logo.png') !!}" alt="{!! config('app.name', 'My Blog') !!}"
                     class="img-fluid mx-auto d-block">
            </a>
        </div>
    </div>
    @include('shared/navbar')
    <div class="container-fluid">
        @include('shared/alerts')
        <div class="row">
            <div class="col-sm-7 col-md-8 col-lg-9">
                <div class="d-block d-sm-none d-md-none d-lg-none">
                    @include('shared/_search_form')
                </div>
                @yield('content')
            </div>
            <div class="col-sm-5 col-md-4 col-lg-3">
                <div class="d-none d-sm-block d-md-block d-lg-block">
                    @include('shared/_search_form')
                </div>
                @include('shared/_subscribe')
                {{--@include('shared/_fb_page')--}}
                @include('shared/_popular_post')
                @include ('posts/_header_category')
                @include ('shared/_latest_post')
                @include('shared/_ads')
            </div>
        </div>
    </div>

    @include('shared/footer')

</div>

<script rel="preload" src="{!! asset('js/app.js') !!}" ></script>
@if (Request::is('posts/*'))
    <script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
@endif
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=1956057827965065';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@yield('scripts')
@stack('inline-scripts')
</body>
</html>
