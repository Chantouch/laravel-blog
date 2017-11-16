<div class="card-columns">
    @each('tags/_show', $tags, 'tag', 'tags/_empty')
</div>

<div class="d-flex justify-content-center">
    {{ $tags->links() }}
</div>
