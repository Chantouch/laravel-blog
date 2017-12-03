@if($category->posts->count())
    @foreach($category->posts->take(6) as $index => $post)
        <div class="list-group-item">
            <div class="media">
                @if ($post->hasThumbnail())
                    {{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'd-flex align-self-center mr-3','width' => '100']) }}
                @endif
                <div class="media-body">
                    <h5 class="mt-0">
                        <a href="{!! route('posts.show', [$post]) !!}">
                            {!! $post->trimTitle() !!}
                        </a>
                    </h5>
                    <p>{!! $post->excerpt() !!}</p>
                </div>
            </div>
        </div>
    @endforeach
    @if($category->posts->count() > 6)
        <a href="{!! route('categories.show', $category) !!}"
           class="list-group-item">
            @lang('posts.attributes.view_more') ({!! $category->posts->count() !!} )
        </a>
    @else
        <a href="{!! route('categories.show', $category) !!}"
           class="list-group-item">@lang('posts.attributes.view_all')</a>
    @endif
@endif