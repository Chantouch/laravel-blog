@extends('layouts.app')

@section('content')
    @include ('posts/_search_form')
    <div class="jumbotron">
        <h1 class="display-3">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
    </div>
    <div class="d-flex justify-content-between">
        <div class="p-2">
            @if (request()->has('q'))
                <h2>{{ trans_choice('posts.search_results', $posts->count(), ['query' => request()->input('q')]) }}</h2>
            @else
                <h2>@lang('posts.last_posts')</h2>
            @endif
        </div>

        <div class="p-2">
            <a href="{{ route('posts.feed') }}" class="pull-right" data-turbolinks="false">
                <i class="fa fa-rss" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    @include ('posts/_list')
@endsection
