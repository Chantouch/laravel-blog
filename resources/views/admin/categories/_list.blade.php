<table class="table table-striped">
    <caption>{{ trans_choice('categories.count', $categories->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('categories.attributes.name')</th>
            <th>@lang('categories.attributes.description')</th>
            <th>@lang('categories.attributes.created_at')</th>
            <th>@lang('categories.attributes.active')</th>
            <th>@lang('categories.attributes.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <th>{{ link_to_route('admin.categories.edit', $category->excerpt($category->name), $category) }}</th>
                <td>{!! $category->excerpt($category->description) !!}</td>
                <td>{{ humanize_date($category->created_at, 'd/m/Y H:i:s') }}</td>
                <td>{!! active($category->active) !!}</td>
                <td>
                    <div class="btn-group">
                        {!! Form::open(['route' => ['admin.categories.destroy', $category], 'method' => 'delete']) !!}
                        <a href="{!! route('admin.categories.show', [$category]) !!}"
                           class='btn btn-info btn-outline btn-1b waves-effect btn-sm'>
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </a>
                        <a href="{!! route('admin.categories.edit', [$category]) !!}"
                           class='btn btn-primary btn-outline waves-effect btn-sm'>
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-outline waves-effect btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $categories->links() }}
</div>
