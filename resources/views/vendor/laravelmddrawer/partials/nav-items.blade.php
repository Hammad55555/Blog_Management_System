{{-- <a class="navbar-brand not-drawer-item" href="{{ url('/') }}">{{ config('app.name', 'Navbar') }}</a> --}}
<ul class="navbar-nav ml-auto">
    @guest
        <li class="nav-item drawer-item">
            <div class="drawer-label text-light">
                <span>{{ config('app.name', 'Navbar') }}</span>
            </div>
        </li>
        <!-- Authentication Links -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @else
        <!-- Navbar items -->
        <li class="nav-item dropdown not-drawer-item">
        <a id="navbarDropdown" class="nav-link dropdown-toggle no-caret navbar-lg-icon" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fas fa-user-circle"></i>
        </a>

        {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <div class="dropdown-item">
                <h5><strong>{{ Auth::user()->name }}</strong></h5>
                <h6>{{ Auth::user()->email }}</h6>
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        </div>
    </li> --}}

        <!-- Drawer items -->
        <li class="nav-item drawer-item">
            <div class="user-drawer-header">
                <h5><strong>{{ Auth::user()->name }}</strong></h5>
                <h6>{{ Auth::user()->email }}</h6>
            </div>
        </li>
        <div class="drawer-divider"></div>
        {{-- <li class="nav-item drawer-item">
        <div class="drawer-label text-light">
            <span>Options</span>
        </div>
    </li> --}}

        <div class="drawer-divider"></div>
    @endguest
</ul>
<li class="nav-item drawer-item">
    <a class="nav-link text-light" href="{{ route('blog.index') }}"
        onclick="event.preventDefault(); document.getElementById('blog.index-form').submit();">
        {{ __('View Posts') }}
    </a>
    <form id="blog.index-form" action="{{ route('blog.index') }}" method="Get" style="display: none;">
        @csrf
    </form>
</li>
@if(Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Editor']))
    <li class="nav-item drawer-item">
        <a class="nav-link text-light" href="{{ route('blog.store') }}"
            onclick="event.preventDefault(); document.getElementById('blog.store-form').submit();">
            {{ __('Create Posts') }}
        </a>
        <form id="blog.store-form" action="{{ route('blog.store') }}" method="GET" style="display: none;">
            @csrf
        </form>
    </li>
@endif
@if(Auth::check() && Auth::user()->hasAnyRole('Admin'))
<li class="nav-item drawer-item">
    <a class="nav-link text-light" href="{{ route('blog.assignRoleShow') }}"
        onclick="event.preventDefault(); document.getElementById('blog.assignRoleShow').submit();">
        {{ __('Assign Role') }}
    </a>
    <form id="blog.assignRoleShow" action="{{ route('blog.assignRoleShow') }}" method="Get" style="display: none;">
        @csrf
    </form>
</li>
@endif


<li class="nav-item drawer-item">
    <a class="nav-link text-light" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
