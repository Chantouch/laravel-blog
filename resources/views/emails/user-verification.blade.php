@extends('layouts.app')
@section('content')
    <div class="card border-warning mb-3">
        <div class="card-header">
            {!! trans('laravel-user-verification::user-verification.verification_error_header') !!}
        </div>
        <div class="card-body text-warning text-center">
            <h4 class="help-block">
                <strong>{!! trans('laravel-user-verification::user-verification.verification_error_message') !!}</strong>
            </h4>
            <div class="form-group">
                <div class="col-md-12 mt-5">
                    <a href="{{url('/')}}" class="btn btn-outline-primary">
                        {!! trans('laravel-user-verification::user-verification.verification_error_back_button') !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection