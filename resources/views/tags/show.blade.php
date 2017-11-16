@extends('layouts.app')

@section('content')
    <div class="bg-white p-3 post-card">
        @if ($tag->hasThumbnail())
            {{ Html::image($tag->thumbnail()->url, $tag->thumbnail()->original_filename, ['class' => 'img-fluid rounded']) }}
        @endif
        <h1 class="text-center">
            <i class="fa fa-tags" aria-hidden="true"></i>
            {{ __('posts.tag'). $tag->name }}
        </h1>
        <div class="mb-3">
            <div class="entry-colors">
                <div class="color_col_2"></div>
                <div class="color_col_3"></div>
                <div class="color_col_1"></div>
            </div>
        </div>

        <div class="post-content">
            {!! $tag->description !!}
            <hr>
            @if($tag->hasPost())
                @include('posts/_list')
            @endif
        </div>
    </div>
@endsection
