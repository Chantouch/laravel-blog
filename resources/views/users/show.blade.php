@extends('layouts.app')
@push('css')
    <style>
        .card-img-top {
            width: 100px;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                @if ($user->hasThumbnail())
                    {{ Html::image($user->thumbnail()->url, $user->thumbnail()->original_filename, ['class' => 'card-img-top mx-auto d-block mt-3', 'width' => '100', 'height' => '100']) }}
                @endif
                <div class="card-body text-center pt-0">
                    <h2 class="card-title mb-0">{{ $user->name }}</h2>
                    <small class="card-subtitle mb-2 text-muted">{{ $user->email }}</small>

                    <div class="card-text row mt-3">
                        <div class="col-md-4">
                            <span class="text-muted d-block"><i class="fa fa-comments-o text-success" aria-hidden="true"></i> @lang('comments.comments')</span>
                            {{ $comments_count }}
                        </div>

                        <div class="col-md-4">
                            <span class="text-muted d-block"><i class="fa fa-book text-info" aria-hidden="true"></i> @lang('posts.posts')</span>
                            {{ $posts_count }}
                        </div>

                        <div class="col-md-4">
                            <span class="text-muted d-block"><i class="fa fa-heart text-danger" aria-hidden="true"></i> @lang('likes.likes')</span>
                            {{ $likes_count }}
                        </div>
                    </div>

                    @profile($user)
                    {{ link_to_route('users.edit', __('users.edit'), [], ['class' => 'btn btn-primary btn-sm float-right']) }}
                    @endprofile
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h2>@lang('comments.last_comments')</h2>
            @each('users/_comment', $comments, 'comment')
        </div>

        <div class="col-md-6">
            <h2>@lang('posts.last_posts')</h2>
            @each('users/_post', $posts, 'post')
        </div>
    </div>
@endsection
