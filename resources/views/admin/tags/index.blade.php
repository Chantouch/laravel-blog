@extends('admin.layouts.app')
@section('content')
    <div class="page-header">
      <h1>
        @lang('dashboard.tags')
        <small class="pull-right">{{ link_to_route('admin.tags.create', __('forms.actions.add'), [], ['class' => 'btn btn-primary btn-sm']) }}</small>
      </h1>
    </div>
    @include ('admin/tags/_list')
@endsection