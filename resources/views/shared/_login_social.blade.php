<div class="d-flex justify-content-between flex-wrap">
    <a href="{{ route('auth.provider', ['provider' => 'github']) }}" class="btn btn-secondary mb-2">
        @lang('auth.services.github')
        <i class="fa fa-github" aria-hidden="true"></i>
    </a>

    <a href="{{ route('auth.provider', ['provider' => 'facebook']) }}" class="btn btn-secondary mb-2">
        @lang('auth.services.facebook')
        <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>

    <a href="{{ route('auth.provider', ['provider' => 'google']) }}" class="btn btn-secondary mb-2">
        @lang('auth.services.google')
        <i class="fa fa-google-plus" aria-hidden="true"></i>
    </a>

    <a href="{{ route('auth.provider', ['provider' => 'twitter']) }}" class="btn btn-secondary mb-2">
        @lang('auth.services.twitter')
        <i class="fa fa-twitter" aria-hidden="true"></i>
    </a>
</div>