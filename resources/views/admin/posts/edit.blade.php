@extends('admin.layouts.app')
@section('content')
    <h1>{{ $post->title }}
        <small>{{ link_to_route('posts.show', __('posts.show'), $post) }}</small>
    </h1>

    @include('admin/posts/_thumbnail')

    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' =>'PUT', 'files' => true]) !!}
    @include('admin/posts/_form')

    {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary','name' => 'submit']) !!}
    {{ link_to_route('admin.posts.index', __('forms.actions.back'), [], ['class' => 'btn btn-outline-info']) }}
    {!! Form::submit(__('forms.actions.draft'), ['class' => 'btn btn-info pull-right','name' => 'submit']) !!}
    {!! Form::close() !!}

    {!! Form::model($post, ['method' => 'DELETE', 'route' => ['admin.posts.destroy', $post], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.posts.delete')]) !!}
    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('posts.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endsection

@include('admin.shared.summernote')

