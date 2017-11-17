@php
    $posted_at = old('posted_at') ?? (isset($post) ? $post->posted_at->format('Y-m-d\TH:i') : null);
@endphp

<div class="form-group">
    {!! Form::label('title', __('posts.attributes.title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('author_id', __('posts.attributes.author')) !!}
        {!! Form::select('author_id', $users, null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'required']) !!}

        @if ($errors->has('author_id'))
            <span class="invalid-feedback">{{ $errors->first('author_id') }}</span>
        @endif
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('posted_at', __('posts.attributes.posted_at')) !!}
        <input type="datetime-local" name="posted_at" value="{{ $posted_at }}"
               class="form-control {{ ($errors->has('posted_at') ? ' is-invalid' : '') }}" required>

        @if ($errors->has('posted_at'))
            <span class="invalid-feedback">{{ $errors->first('posted_at') }}</span>
        @endif
    </div>
</div>

<div class="form-group has-success{{ $errors->has('categories') ? ' has-error' : '' }}">
    {!! Form::label('categories', __('posts.attributes.categories')) !!}

    <post-categories
            :category_list="{!! isset($post->categories) ? $post->categories->pluck('id') : '[]' !!}"
            modal_button_save="{!! __('forms.actions.save') !!}"
            modal_button_close="{!! __('forms.actions.back') !!}"
            modal_title="{!! __('posts.attributes.new_category') !!}">
    </post-categories>

    @if ($errors->has('categories'))
        <span class="help-block">
            <small>{{ $errors->first('categories') }}</small>
        </span>
    @endif
</div>

<div class="form-group has-success{{ $errors->has('tags') ? ' has-error' : '' }}">
    {!! Form::label('tags', __('tags.attributes.title')) !!}
    <post-tags
            :tag_list="{!! isset($post->tags) ? $post->tags->pluck('id') : '[]' !!}"
            modal_button_save="{!! __('forms.actions.save') !!}"
            modal_button_close="{!! __('forms.actions.back') !!}"
            modal_title="{!! __('posts.attributes.new_tag') !!}">
    </post-tags>
    @if ($errors->has('tags'))
        <span class="help-block">
            <small>{{ $errors->first('tags') }}</small>
        </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('thumbnail', __('posts.attributes.thumbnail')) !!}
    {!! Form::file('thumbnail', ['accept' => 'image/*', 'class' => 'form-control' . ($errors->has('thumbnail') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('thumbnail'))
        <span class="invalid-feedback">{{ $errors->first('thumbnail') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('content', __('posts.attributes.content')) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control form-editor' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>

@php
$title = old('source_title') ?? (isset($post->source) ? $post->source->title : null);
$url = old('source_url') ?? (isset($post->source) ? $post->source->url : null);
$translator = old('source_translator') ?? (isset($post->source) ? $post->source->translator : null);
@endphp

<div class="form-row">
    <div class="form-group col-md-12">
        <h4>{!! __('posts.attributes.references') !!}</h4>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('source_title', __('posts.attributes.source_title')) !!}
        {!! Form::text('source_title', $title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '')]) !!}

        @if ($errors->has('source_title'))
            <span class="invalid-feedback">{{ $errors->first('source_title') }}</span>
        @endif
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('source_url', __('posts.attributes.source_url')) !!}
        {!! Form::text('source_url', $url, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '')]) !!}

        @if ($errors->has('source_url'))
            <span class="invalid-feedback">{{ $errors->first('source_title') }}</span>
        @endif
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('source_translator', __('posts.attributes.source_translator')) !!}
        {!! Form::text('source_translator', $translator, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : '')]) !!}

        @if ($errors->has('source_translator'))
            <span class="invalid-feedback">{{ $errors->first('source_translator') }}</span>
        @endif
    </div>
</div>
