@extends('layouts.app')

@section('content')
    @include ('posts/_tag_list')
    <div class="d-flex justify-content-between">
        <div class="p-2">
            <h2><i class="fa fa-tags" aria-hidden="true"></i> @lang('categories.latest_category')</h2>
        </div>

        <div class="p-2">
            <a href="{{ route('posts.feed') }}" class="pull-right" data-turbolinks="false">
                <i class="fa fa-rss" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    @include ('categories/_list')
@endsection
