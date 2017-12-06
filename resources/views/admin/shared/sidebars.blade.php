<nav class="d-none d-md-block d-lg-block bg-dark sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="text-muted menu-title">Navigation</li>
        <li role="presentation" class="nav-item">
            <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.dashboard')
            </a>
        </li>

        <li role="presentation" class="nav-item">
            <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/posts/*') ? 'active' : '' }}"
               href="{{ route('admin.posts.index') }}">
                <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.posts')
            </a>
        </li>

        <li role="presentation" class="nav-item">
            <a class="nav-link {{ Request::is('admin/comments') || Request::is('admin/comments/*') ? 'active' : '' }}"
               href="{{ route('admin.comments.index') }}">
                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.comments')
            </a>
        </li>

        <li role="presentation" class="nav-item">
            <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*') ? 'active' : '' }}"
               href="{{ route('admin.users.index') }}">
                <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.users')
            </a>
        </li>

        <li role="presentation" class="nav-item">
            <a class="nav-link {{ Request::is('admin/roles') || Request::is('admin/roles/*') ? 'active' : '' }}"
               href="{{ route('admin.roles.index') }}">
                <i class="fa fa-bolt" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.roles')
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a href="{{ route('admin.medias.index') }}"
               class="nav-link {{ Request::is('admin/medias') || Request::is('admin/medias/*') ? 'active' : '' }}">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.media')
            </a>
        </li>

        <li class="text-muted menu-title">@lang('dashboard.configuration.setting')</li>

        <li class="nav-item" role="presentation">
            <a href="{!! route('admin.tags.index') !!}"
               class="nav-link {{ Request::is('admin/tags') || Request::is('admin/tags/*') ? 'active' : '' }}">
                <i class="fa fa-tags" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.configuration.tag')
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a href="{!! route('admin.categories.index') !!}"
               class="nav-link {{ Request::is('admin/categories') || Request::is('admin/categories/*') ? 'active' : '' }}">
                <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
                @lang('dashboard.configuration.category')
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
</nav>
