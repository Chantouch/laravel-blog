@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <h1>@lang('auth.login')</h1>

            {!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('email', __('validation.attributes.email'), ['class' => 'control-label']) !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}

                @if ($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('password', __('validation.attributes.password'), ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'required']) !!}

                @if ($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    {!! Form::checkbox('remember', null, old('remember'), ['class'=>'custom-control-input']) !!}
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">@lang('auth.remember_me')</span>
                </label>
            </div>

            <div class="form-group">
                {!! Form::submit(__('auth.login'), ['class' => 'btn btn-primary']) !!}
                {{ link_to_route('home', __('forms.actions.back'), [], ['class' => 'btn btn-danger']) }}
                {{ link_to('/password/reset', __('auth.forgotten_password'), ['class' => 'btn btn-link'])}}
            </div>
            {!! Form::close() !!}

            <hr>

            @include('shared._login_social')
        </div>
    </div>
@endsection
