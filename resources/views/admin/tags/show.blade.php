@extends('admin.layouts.app')

@section('content')
    <h1>{{ $tag->name }}
        <small>{{ link_to_route('admin.tags.show', __('tags.show'), $tag) }}</small>
    </h1>
    <hr>
    @if ($tag->hasThumbnail())
        <p>
            {{ Html::image($tag->thumbnail()->url, $tag->thumbnail()->original_filename, ['class' => 'img-thumbnail', 'width' => '350']) }}

            {!! Form::model($tag, ['method' => 'DELETE', 'route' => ['admin.tags.destroy', $tag], 'data-confirm' => __('forms.tags.delete_thumbnail')]) !!}
            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('tags.delete_thumbnail'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </p>
    @endif

    {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' =>'PUT', 'files' => true]) !!}
    <fieldset disabled="disabled">
    @include('admin/tags/_form')
    {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
    {{ link_to_route('admin.tags.index', __('forms.actions.back'), [], ['class' => 'btn btn-outline-info']) }}
    {!! Form::close() !!}
    </fieldset>
    {!! Form::model($tag, ['method' => 'DELETE', 'route' => ['admin.tags.destroy', $tag], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.tags.delete')]) !!}
    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('tags.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endsection
@section('js')
    @include('admin.shared.trumbowyg')
@stop
