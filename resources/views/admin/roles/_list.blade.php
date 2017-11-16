<table class="table table-striped">
    <caption>{{ trans_choice('roles.count', $roles->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('roles.attributes.num')</th>
            <th>@lang('roles.attributes.name')</th>
            <th>@lang('roles.attributes.created_at')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $index => $role)
            <tr>
                <th>{!! $index + 1 !!}</th>
                <td>{{ $role->name }}</td>
                <td>{{ humanize_date($role->created_at, 'd/m/Y H:i:s') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $roles->links() }}
</div>
