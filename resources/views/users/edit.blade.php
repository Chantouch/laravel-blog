@extends('users.layout', ['tab' => 'profile'])

@section('main_content')
    <div class="card">
        <div class="card-body">
            <h1>@lang('users.profile')</h1>
            <hr class="my-4">

            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user], 'files' => true]) !!}

            <div class="form-group row">
                {!! Form::label('name', __('users.attributes.name'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.name'), 'required']) !!}

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('email', __('users.attributes.email'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.email'), 'required']) !!}

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('thumbnail', __('users.attributes.thumbnail'), ['class' => 'col-sm-2 col-form-label']) !!}

                <div class="col-sm-5">
                    {!! Form::file('thumbnail', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('thumbnail') ? ' is-invalid' : '')]) !!}

                    @if ($errors->has('thumbnail'))
                        <span class="invalid-feedback">{{ $errors->first('thumbnail') }}</span>
                    @endif
                </div>
            </div>

            @if ($user->hasThumbnail())
                <p>
                    {{ Html::image($user->thumbnail()->url, $user->thumbnail()->original_filename, ['class' => 'img-thumbnail', 'width' => '350']) }}
                </p>
            @endif

            <div class="form-group offset-sm-2">
                {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-success btn-outline']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
