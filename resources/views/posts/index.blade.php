@extends('layouts.app')

@section('content')
    @include ('posts/_header_category')
    <div class="d-flex justify-content-between">
        <div class="p-2 text-center">
            @if (request()->has('q'))
                <h2>{{ trans_choice('posts.search_results', $count_posts, ['query' => request()->input('q')]) }}</h2>
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
    @include ('posts/_tag_list')
@endsection