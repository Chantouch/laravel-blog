<div class="card border-danger mb-3 right-sidebar">
    <div class="card-header">
        {!! __('home.right-sidebar.subscribe-your-email-address') !!}
    </div>
    <div class="card-body text-danger">
        {!! Form::open(['route' => 'newsletter-subscriptions.store', 'method' => 'post', 'class' => 'my-2 my-lg-0']) !!}
        <div class="input-group">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('newsletter.placeholder')]) !!}
            <span class="input-group-btn">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-envelope-open-o mr-1" aria-hidden="true"></i>
                    <span class="d-none d-sm-none d-md-none d-lg-block pull-right">{!! __('newsletter.subscribre') !!}</span>
                </button>
            </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>