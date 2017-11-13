<table class="table table-striped">
    <caption>{{ trans_choice('tags.count', $tags->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('tags.attributes.name')</th>
            <th>@lang('tags.attributes.description')</th>
            <th>@lang('tags.attributes.created_at')</th>
            <th>@lang('tags.attributes.active')</th>
            <th>@lang('tags.attributes.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)
            <tr>
                <th>{{ link_to_route('admin.tags.edit', $tag->name, $tag) }}</th>
                <td>{!! $tag->description !!}</td>
                <td>{{ humanize_date($tag->created_at, 'd/m/Y H:i:s') }}</td>
                <td>{!! active($tag->active) !!}</td>
                <td>
                    <div class="btn-group">
                        {!! Form::open(['route' => ['admin.tags.destroy', $tag->id], 'method' => 'delete']) !!}
                        <a href="{!! route('admin.tags.show', [$tag->id]) !!}"
                           class='btn btn-info btn-outline btn-1b waves-effect btn-sm'>
                            {!! __('tags.view') !!}
                        </a>
                        <a href="{!! route('admin.tags.edit', [$tag->id]) !!}"
                           class='btn btn-primary btn-outline waves-effect btn-sm'>
                            {!! __('tags.edit') !!}
                        </a>
                        {!! Form::button(__('tags.delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-outline waves-effect btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $tags->links() }}
</div>
