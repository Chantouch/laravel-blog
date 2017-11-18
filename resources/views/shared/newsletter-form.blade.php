@auth
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
@endauth