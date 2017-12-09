@extends('admin.layouts.app')

@section('content')
    <p>@lang('users.create')</p>
    {!! Form::open(['route' => ['admin.users.store'], 'method' =>'POST']) !!}

    @include('admin/users/_form')

    {!! Form::close() !!}
@endsection
