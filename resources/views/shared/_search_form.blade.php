<div class="card border-dark mb-3 right-sidebar">
    <div class="card-header">
        {!! __('home.right-sidebar.search') !!}
    </div>
    <div class="card-body text-dark">
        {!! Form::open(['route' => 'home', 'class' => 'my-2 my-lg-0', 'method' => 'GET']) !!}
        <div class="input-group">
            {!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => __('posts.search')]) !!}
            <span class="input-group-btn">
                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search fa-fw mr-1" aria-hidden="true"></i>
                    <span class="d-none d-sm-none d-md-none d-lg-block pull-right">{!! __('home.right-sidebar.submit') !!}</span>
                </button>
            </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>