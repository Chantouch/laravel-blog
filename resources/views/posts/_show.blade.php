<div class="card">
    @if ($post->hasThumbnail())
        <a href="{{ route('posts.show', $post)}}">
            {{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'card-img-top']) }}
        </a>
    @endif

    <div class="card-body">
        <h4 class="card-title">{{ link_to_route('posts.show', $post->trimTitle(), $post) }}</h4>

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
            <div class="entry-colors">
                <div class="color_col_2"></div>
                <div class="color_col_3"></div>
                <div class="color_col_1"></div>
            </div>
        </div>
        <div class="card-text post-content">{!! $post->excerpt() !!}</div>
        <p class="card-text">
            @if(count($post->categories))
                <small class="text-muted">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    {{ __('posts.category') }}
                    @foreach($post->categories as $category)
                        <span class="badge badge-info ml-1">
                            {!! $category->name !!}
                        </span>
                    @endforeach
                </small>
                ,
            @endif
            <small class="text-muted">
                <i class="fa fa-eye" aria-hidden="true"></i>
                {{ $post->view_count .' '. __('posts.view_count') }}
            </small>
        </p>
    </div>
</div>
