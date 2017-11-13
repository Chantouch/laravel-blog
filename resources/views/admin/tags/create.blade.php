@extends('admin.layouts.app')

@section('content')
    <h1>@lang('tags.create')</h1>

    {!! Form::open(['route' => ['admin.tags.store'], 'method' =>'POST', 'files' => true]) !!}
    @include('admin/tags/_form')

    {{ link_to_route('admin.tags.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
    {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
@section('js')
    @include('admin.shared.trumbowyg')
@stop
