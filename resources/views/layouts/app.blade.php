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

    <div class="container-fluid {{ (Request::is('/') || Request::is('posts/*') || Request::is('login') || Request::is('register')) ? '' : 'bg-white' }}">
        @include('shared/navbar')
        <div class="pt-50">
            @include('shared/alerts')
        </div>
        <div class="row pt-50">
            <div class="col-md-9">
                @yield('content')
            </div>
            <div class="col-md-3">
                <div class="card border-dark mb-3 right-sidebar">
                    <div class="card-header">
                        {!! __('home.right-sidebar.search') !!}
                    </div>
                    <div class="card-body text-dark">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control" type="text" placeholder="{!! __('home.placeholder.search') !!}">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                {!! __('home.right-sidebar.submit') !!}
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card border-danger mb-3 right-sidebar">
                    <div class="card-header">
                        {!! __('home.right-sidebar.subscribe-your-email-address') !!}
                    </div>
                    <div class="card-body text-danger">
                        {!! Form::open(['route' => 'newsletter-subscriptions.store', 'method' => 'post', 'class' => 'form-inline my-2 my-lg-0']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('newsletter.placeholder')]) !!}
                        {!! Form::submit(__('newsletter.subscribre'), ['class' => 'btn btn-secondary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="card border-warning mb-3 right-sidebar">
                    <div class="card-header">
                        {!! __('home.right-sidebar.connect-with-us-on-fb') !!}
                    </div>
                    <div class="card-body text-warning">
                        <div class="fb-page" data-href="https://www.facebook.com/khclassifiedads/" data-tabs="timeline"
                             data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                             data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/khclassifiedads/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/khclassifiedads/"> KH Classified Ads</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="card border-success mb-3">
                    <div class="card-header">
                        {!! __('home.right-sidebar.popular-post') !!}
                    </div>
                    <div class="card-body">
                        <right-sidebar-popular-post></right-sidebar-popular-post>
                    </div>
                </div>
                <div class="card border-primary mb-3 right-sidebar">
                    <div class="card-header">
                        {!! __('home.right-sidebar.categories') !!}
                    </div>
                    <div class="card-body text-primary">
                        <right-sidebar-category></right-sidebar-category>
                    </div>
                </div>
                <div class="card border-secondary mb-3">
                    <div class="card-header">
                        {!! __('home.right-sidebar.latest-posts') !!}
                    </div>
                    <div class="card-body text-secondary">
                        <right-sidebar-latest-post></right-sidebar-latest-post>
                    </div>
                </div>
                <div class="card border-success mb-3">
                    <div class="card-header">
                        {!! __('home.right-sidebar.advertisement') !!}
                    </div>
                    <div class="card-body text-success">
                        <h4 class="card-title">Place your ads here</h4>
                        <p class="card-text">You will get more client by advertise with us.</p>
                    </div>
                </div>
                <div class="card border-info mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body text-info">
                        <h4 class="card-title">Info card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <div class="card border-light mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h4 class="card-title">Light card title</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
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
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=1956057827965065';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@stack('inline-scripts')
</body>
</html>
