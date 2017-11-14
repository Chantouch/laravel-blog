<div class="card border-dark mb-3 right-sidebar">
    <div class="card-header">
        {!! __('home.right-sidebar.search') !!}
    </div>
    <div class="card-body text-dark">
        {!! Form::open(['route' => 'home', 'class' => 'form-inline my-2 my-lg-0', 'method' => 'GET']) !!}
        {!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => __('posts.search')]) !!}
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            {!! __('home.right-sidebar.submit') !!}
        </button>
        {!! Form::close() !!}
    </div>
</div>