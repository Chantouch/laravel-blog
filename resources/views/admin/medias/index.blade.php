@extends('admin.layouts.app')

@section('content')
    <div class="page-header">
        <h1>@lang('dashboard.media')</h1>
    </div>
    @include ('admin/medias/_list')
@endsection
