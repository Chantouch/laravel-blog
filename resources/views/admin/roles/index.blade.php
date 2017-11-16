@extends('admin.layouts.app')
@section('content')
    <div class="page-header">
        <h1>@lang('dashboard.roles')</h1>
    </div>
    @include ('admin/roles/_list')
@endsection