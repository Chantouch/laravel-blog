@extends('layouts.app')

@section('content')
    <div class="card border-secondary mb-3">
        <div class="card-header">
            @lang('posts.attributes.sitemap')
        </div>
        <div class="card-body text-secondary">
            <div class="row">
                @if($categories->count())
                    @foreach($categories as $category)
                        <div class="col-md-6">
                            <h3 class="cat-title">
                                <a href="{!! route('categories.show', $category) !!}">
                                    <i class="fa fa-check m-r-10"></i>{!! $category->name !!}
                                    <span class="count">({!! $category->posts->count() !!})</span>
                                </a>
                            </h3>
                            <div class="list-group">
                                @include('sitemap/_list')
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@stop