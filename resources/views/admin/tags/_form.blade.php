<div class="form-group">
    {!! Form::label('name', __('categories.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('thumbnail', __('categories.attributes.thumbnail')) !!}
    {!! Form::file('thumbnail', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('thumbnail') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('thumbnail'))
        <span class="invalid-feedback">{{ $errors->first('thumbnail') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('content', __('categories.attributes.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>