@extends('layouts.app')

@section('content')
    <div class="bg-white p-3 post-card">
        @if ($category->hasThumbnail())
            {{ Html::image($category->thumbnail()->url, $category->thumbnail()->original_filename, ['class' => 'img-fluid rounded']) }}
        @endif
        <h1 class="text-center">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            {{ __('posts.category'). $category->name }}
        </h1>
        <div class="mb-3">
            <div class="entry-colors">
                <div class="color_col_2"></div>
                <div class="color_col_3"></div>
                <div class="color_col_1"></div>
            </div>
        </div>

        <div class="post-content">
            {!! $category->description !!}
            <hr>
            @if($category->hasPost())
                @include('posts/_list')
            @endif
        </div>
    </div>
@endsection
