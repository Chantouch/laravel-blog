@extends('layouts.app')

@section('content')
    <div class="bg-white p-3 post-card">
        @if ($post->hasThumbnail())
            {{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'img-fluid rounded']) }}
        @endif

        <h1>{{ $post->title }}</h1>

        <div class="mb-3">
            <small class="text-muted">
                <i class="fa fa-user mr-1" aria-hidden="true"></i>
                By {{ link_to_route('users.show', $post->author->fullname, $post->author) }}
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
                        <span class="badge badge-info ml-1">
                            {!! $category->name !!}
                        </span>
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
    @include('posts/tag')
    @include ('comments/_list')
@endsection
