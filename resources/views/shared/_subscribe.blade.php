<div class="card border-danger mb-3 right-sidebar">
    <div class="card-header">
        {!! __('home.right-sidebar.subscribe-your-email-address') !!}
    </div>
    <div class="card-body text-danger">
        {!! Form::open(['route' => 'newsletter-subscriptions.store', 'method' => 'post', 'class' => 'form-inline my-2 my-lg-0']) !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('newsletter.placeholder')]) !!}
        {!! Form::submit(__('newsletter.subscribre'), ['class' => 'btn btn-secondary']) !!}
        {!! Form::close() !!}
    </div>
</div>