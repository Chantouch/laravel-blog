@extends('admin.layouts.app')
@section('content')
    <div class="page-header">
      <h1>
        @lang('dashboard.categories')
        <small class="pull-right">{{ link_to_route('admin.categories.create', __('forms.actions.add'), [], ['class' => 'btn btn-primary btn-sm']) }}</small>
      </h1>
    </div>
    @include ('admin/categories/_list')
@endsection