<table class="table table-striped">
    <caption>{{ trans_choice('posts.count', $posts->total()) }}</caption>
    <thead>
    <tr>
        <th>@lang('posts.attributes.title')</th>
        <th>@lang('posts.attributes.author')</th>
        <th>@lang('posts.attributes.posted_at')</th>
        <th><i class="fa fa-comments" aria-hidden="true"></i></th>
        <th>@lang('posts.attributes.action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th>{{ link_to_route('admin.posts.edit', $post->trimTitle(), $post) }}</th>
            <td>{{ link_to_route('users.show', $post->author->fullname, $post->author) }}</td>
            <td>{{ humanize_date($post->posted_at, 'd/m/Y H:i:s') }}</td>
            <td><span class="badge badge-pill badge-secondary">{{ $post->comments_count }}</span></td>
            <td>
                <div class="btn-group">
                    {!! Form::open(['route' => ['admin.posts.destroy', $post->slug], 'method' => 'delete']) !!}
                    <a href="{!! route('admin.posts.edit', [$post->slug]) !!}"
                       class='btn btn-primary btn-outline waves-effect btn-sm'>
                        {!! __('posts.edit') !!}
                    </a>
                    {!! Form::button(__('posts.delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-outline waves-effect btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
