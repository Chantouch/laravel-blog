<div class="card-columns">
    @each('categories/_show', $categories, 'category', 'categories/_empty')
</div>

<div class="d-flex justify-content-center">
    {{ $categories->links() }}
</div>
