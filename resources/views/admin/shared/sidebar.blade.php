<ul class="navbar-nav navbar-sidenav">
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.dashboard')">
        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.dashboard')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.posts')">
        <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/posts/*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.posts')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.comments')">
        <a class="nav-link {{ Request::is('admin/comments') || Request::is('admin/comments/*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.comments')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.users')">
        <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.users')</span>
        </a>
    </li>

    <li role="presentation" class="nav-item" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.roles')">
        <a class="nav-link {{ Request::is('admin/roles') || Request::is('admin/roles/*') ? 'active' : '' }}"
           href="{{ route('admin.roles.index') }}">
            <i class="fa fa-bolt" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.roles')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.configuration.tag')">
        <a href="{!! route('admin.tags.index') !!}"
           class="nav-link {{ Request::is('admin/tags') || Request::is('admin/tags/*') ? 'active' : '' }}">
            <i class="fa fa-tags" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.configuration.tag')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.configuration.category')">
        <a href="{!! route('admin.categories.index') !!}"
           class="nav-link {{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'active' : '' }}">
            <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.configuration.category')</span>
        </a>
    </li>

</ul>

<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
