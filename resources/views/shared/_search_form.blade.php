<div class="card border-dark mb-3 right-sidebar">
    <div class="card-header">
        {!! __('home.right-sidebar.search') !!}
    </div>
    <div class="card-body text-dark">
        {!! Form::open(['route' => 'home', 'class' => 'my-2 my-lg-0', 'method' => 'GET']) !!}
        <div class="input-group">
            {!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => __('posts.search')]) !!}
            <span class="input-group-btn">
                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search fa-fw"></i>
                    {!! __('home.right-sidebar.submit') !!}
                </button>
            </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>