<div class="card">
    @if ($tag->hasThumbnail())
        <a href="{{ route('tags.show', $tag)}}">
            {{ Html::image($tag->thumbnail()->url, $tag->thumbnail()->original_filename, ['class' => 'card-img-top']) }}
        </a>
    @endif

    <div class="card-body">
        <h4 class="card-title">
            {{ link_to_route('tags.show', $tag->name, $tag->slug) }} ({!! $tag->posts_count !!})
        </h4>
        <div class="mb-3">
            <small class="text-muted">{{ humanize_date($tag->created_at) }}</small>
            <div class="entry-colors">
                <div class="color_col_2"></div>
                <div class="color_col_3"></div>
                <div class="color_col_1"></div>
            </div>
        </div>
        <div class="card-text post-content">{!! $tag->description !!}</div>
    </div>
</div>
