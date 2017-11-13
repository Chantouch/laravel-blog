@extends('admin.layouts.app')

@section('content')
    <h1>{{ $category->name }}
        <small>{{ link_to_route('admin.categories.show', __('categories.show'), $category) }}</small>
    </h1>
    <hr>
    @if ($category->hasThumbnail())
        <p>
            {{ Html::image($category->thumbnail()->url, $category->thumbnail()->original_filename, ['class' => 'img-thumbnail', 'width' => '350']) }}

            {!! Form::model($category, ['method' => 'DELETE', 'route' => ['admin.categories.destroy', $category], 'data-confirm' => __('forms.categories.delete_thumbnail')]) !!}
            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('categories.delete_thumbnail'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </p>
    @endif

    {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' =>'PUT', 'files' => true]) !!}
    <fieldset disabled="disabled">
    @include('admin/categories/_form')
    {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
    {{ link_to_route('admin.categories.index', __('forms.actions.back'), [], ['class' => 'btn btn-outline-info']) }}
    {!! Form::close() !!}
    </fieldset>
    {!! Form::model($category, ['method' => 'DELETE', 'route' => ['admin.categories.destroy', $category], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.categories.delete')]) !!}
    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('categories.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endsection
@section('js')
    @include('admin.shared.trumbowyg')
@stop
