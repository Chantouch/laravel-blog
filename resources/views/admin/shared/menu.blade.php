<nav class="list-group border-0 card text-center text-md-left p-fix">
    <a href="{{ route('admin.dashboard') }}"
       class="list-group-item d-inline-block collapsed {{ Request::is('admin/dashboard') ? 'active' : '' }}"
       data-parent="#sidebar">
        <i class="fa fa-dashboard"></i> <span class="d-none d-md-inline">
            @lang('dashboard.dashboard')
        </span>
    </a>
    <a href="{{ route('admin.posts.index') }}"
       class="list-group-item d-inline-block collapsed {{ Request::is('admin/posts') || Request::is('admin/posts/*') ? 'active' : '' }}"
       data-parent="#sidebar">
        <i class="fa fa-file-text"></i> <span class="d-none d-md-inline">
            @lang('dashboard.posts')
        </span>
    </a>
    <a href="{{ route('admin.comments.index') }}"
       class="list-group-item d-inline-block collapsed {{ Request::is('admin/comments') || Request::is('admin/comments/*') ? 'active' : '' }}"
       data-parent="#sidebar">
        <i class="fa fa-comments"></i> <span class="d-none d-md-inline">
            @lang('dashboard.comments')
        </span>
    </a>
    <a href="{{ route('admin.users.index') }}"
       class="list-group-item d-inline-block collapsed {{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}"
       data-parent="#sidebar">
        <i class="fa fa-users"></i> <span class="d-none d-md-inline">
            @lang('dashboard.users')
        </span>
    </a>
    <a href="{{ route('admin.medias.index') }}"
       class="list-group-item d-inline-block collapsed {{ Request::is('admin/medias') || Request::is('admin/medias/*') ? 'active' : '' }}"
       data-parent="#sidebar">
        <i class="fa fa-file-image-o"></i> <span class="d-none d-md-inline">
            @lang('dashboard.media')
        </span>
    </a>
    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar">
        <i class="fa fa-gear"></i> <span class="d-none d-md-inline">Link</span>
    </a>
    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar">
        <i class="fa fa-calendar"></i> <span class="d-none d-md-inline">Link</span>
    </a>
    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar">
        <i class="fa fa-envelope"></i> <span class="d-none d-md-inline">Link</span>
    </a>
    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar">
        <i class="fa fa-bar-chart-o"></i> <span class="d-none d-md-inline">Link</span>
    </a>
    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar">
        <i class="fa fa-star"></i> <span class="d-none d-md-inline">Link</span>
    </a>

    <a href="#configuration" class="list-group-item d-inline-block collapsed" data-toggle="collapse"
       data-parent="#sidebar" aria-expanded="false">
        <i class="fa fa-gear"></i>
        <span class="d-none d-md-inline">{!! __('dashboard.configuration.setting') !!}</span>
    </a>
    <div class="collapse {{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'show' : '' }}" id="configuration">
        <a href="{!! route('admin.tags.index') !!}" class="list-group-item {{ Request::is('admin/tags') || Request::is('admin/tags/*') ? 'active' : '' }}" data-parent="#menu1">
            <i class="fa fa-bar-chart-o"></i>  {!! __('dashboard.configuration.tag') !!}
        </a>
        <a href="{!! route('admin.categories.index') !!}" class="list-group-item {{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'active' : '' }}" data-parent="#menu1">
            <i class="fa fa-star"></i> {!! __('dashboard.configuration.category') !!}
        </a>
    </div>
    <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse"
       data-parent="#sidebar" aria-expanded="false"><i class="fa fa-book"></i> <span
                class="d-none d-md-inline">Item 3 </span></a>
    <div class="collapse" id="menu3">
        <a href="#" class="list-group-item" data-parent="#menu3">3.1</a>
        <a href="#menu3sub2" class="list-group-item" data-toggle="collapse"
           aria-expanded="false">3.2 </a>
        <div class="collapse" id="menu3sub2">
            <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 a</a>
            <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 b</a>
            <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 c</a>
        </div>
        <a href="#" class="list-group-item" data-parent="#menu3">3.3</a>
    </div>
</nav>