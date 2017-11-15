<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-md">
{{--<div class="{{ Request::is('admin/*') ? 'container-fluid' : 'container-fluid' }}">--}}
<!-- Branding Image -->
{{ link_to_route('home', config('app.name', 'Laravel'), [], ['class' => 'navbar-brand']) }}

<!-- Collapsed Hamburger -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        @admin
        <ul class="navbar-nav">
            <li class="nav-item">
                {{ link_to_route('admin.dashboard', __('dashboard.dashboard'), [], ['class' => 'nav-link']) }}
            </li>
        </ul>
        @if(Request::is('admin/*'))
            <a href="javascript:void (0)" data-target="#sidebar" data-toggle="collapse">
                <i class="fa fa-navicon fa-2x py-2 p-1"></i>
            </a>
        @endif
        @endadmin
        <ul class="navbar-nav ml-auto">
            @if(!Request::is('admin/*'))
                <li class="nav-item">
                    <a href="{!! route('home') !!}" title="{!! __('home.menu.home') !!}" class="nav-link">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" title="{!! __('home.menu.tags') !!}" class="nav-link">
                        {!! __('home.menu.tags') !!}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" title="{!! __('home.menu.demo_post') !!}" class="nav-link">
                        {!! __('home.menu.demo_post') !!}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" title="{!! __('home.menu.latest_post') !!}" class="nav-link">
                        {!! __('home.menu.latest_post') !!}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" title="{!! __('home.menu.home') !!}" class="nav-link">
                        {!! __('home.menu.categories') !!}
                    </a>
                </li>
            @endif
            @guest
                <li class="nav-item">{{ link_to_route('login', __('auth.login'), [], ['class' => 'nav-link']) }}</li>
                <li class="nav-item">{{ link_to_route('register', __('auth.register'), [], ['class' => 'nav-link']) }}</li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{ link_to_route('users.show', __('users.profil'), Auth::user(), ['class' => 'dropdown-item']) }}
                            <a href="{{ url('/logout') }}"
                               class="dropdown-item"
                               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                @lang('auth.logout')
                            </a>

                            <form id="logout-form" class="d-none" action="{{ url('/logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @endguest
        </ul>
    </div>
    {{--</div>--}}
</nav>