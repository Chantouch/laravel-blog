@extends('layouts.app')
@push('css')
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-plain.css"/>
@endpush
@section('content')
    <div class="bg-white p-3 post-card">
        @if ($post->hasThumbnail())
            {{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'img-fluid rounded']) }}
        @endif
        <h1>{{ $post->title }}</h1>
        <div class="mb-3">
            <small class="text-muted">
                <i class="fa fa-user mr-1" aria-hidden="true"></i>
                @lang('posts.attributes.by') {{ link_to_route('users.show', $post->author->fullname, $post->author) }}
            </small>
            ,
            <small class="text-muted">{{ humanize_date($post->posted_at) }}</small>
            ,
            <small class="text-muted">
                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                {{ trans_choice('comments.count', $post->comments_count) }}
            </small>
            ,
            <small class="text-muted">
                <i class="fa fa-eye" aria-hidden="true"></i>
                {{ $post->view_count .' '. __('posts.view_count') }}
            </small>
            @if(count($post->categories))
                ,
                <small class="text-muted">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    {{ __('posts.category') }}
                    @foreach($post->categories as $category)
                        <a href="{!! route('categories.show', [$category]) !!}"><span class="badge badge-info ml-1">
                            {!! $category->name !!}
                        </span></a>
                    @endforeach
                </small>
            @endif
            <div class="entry-colors">
                <div class="color_col_2"></div>
                <div class="color_col_3"></div>
                <div class="color_col_1"></div>
            </div>
        </div>

        <div class="post-content">
            {!! $post->content !!}
        </div>
    </div>
    @include('posts._tag')
    @if(!empty($post->source))
        <div class="card border-warning mb-3 mt-4 right-sidebar">
            <div class="card-body text-primary">
                <h5 class="post-tags">
                    <i class="fa fa-link" aria-hidden="true"></i>
                    @lang('posts.attributes.references')
                    <a href="{!! $post->source->url !!}" title="{!! $post->source->title !!}" target="_blank"
                       rel="noreferrer">
                    <span class="badge badge-dark ml-1">
                        {{ $post->source->title }}
                    </span>
                    </a>
                    @lang('posts.attributes.by') <span
                            class="badge badge-pill badge-secondary">{!! $post->source->translator !!}</span>
                </h5>
            </div>
        </div>
    @endif
    <div class="card border-info mb-3 mt-4 right-sidebar">
        <div class="card-header">
            <h5 class="post-tags">
                <i class="fa fa-social" aria-hidden="true"></i>
                @lang('posts.attributes.share')
            </h5>
        </div>
        <div class="card-body text-primary">
            <div id="share"></div>
        </div>
    </div>
    @include ('comments/_list')
@endsection

@push('inline-scripts')
    <script rel="prefetch"
            src="https://rawgit.com/google/code-prettify/master/loader/run_prettify.js?autoload=true&amp;skin=sons-of-obsidian&amp;lang=css"></script>
    <script rel="prefetch" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script>
        (function () {
            $('.post-content pre').addClass('prettyprint');
            $("#share").jsSocials({
                shares: ["facebook", "googleplus", "twitter", "linkedin", "pinterest", "email"]
            });
        })();
    </script>
@endpush