<div class="card">
    @if ($category->hasThumbnail())
        <a href="{{ route('categories.show', $category)}}">
            {{ Html::image($category->thumbnail()->url, $category->thumbnail()->original_filename, ['class' => 'card-img-top']) }}
        </a>
    @endif

    <div class="card-body">
        <h4 class="card-title">
            {{ link_to_route('categories.show', $category->name, $category->slug) }} ({!! $category->posts_count !!})
        </h4>
        <div class="mb-3">
            <small class="text-muted">{{ humanize_date($category->created_at) }}</small>
            <div class="entry-colors">
                <div class="color_col_2"></div>
                <div class="color_col_3"></div>
                <div class="color_col_1"></div>
            </div>
        </div>
        <div class="card-text post-content">{!! $category->description !!}</div>
    </div>
</div>
