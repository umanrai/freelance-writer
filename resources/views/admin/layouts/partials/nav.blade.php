
@stack('css')

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
        Freelancer @if (auth()->check()) <span
            class="badge badge-success">{{ \App\Misc\Role::all()[auth()->user()->role_id] ?? 'N/A' }}</span>  @endif
    </a>

    <ul class="navbar-nav px-3">
        @auth

            <li class="nav-item text-nowrap">
                <a class="nav-link " href="{{ url('/') }}" target="_blank">Home</a>
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Sign out') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li class="nav-item text-nowrap">

                <a class="nav-link" href="{{ route('login') }}">Login </a>
            </li>

            <li class="nav-item text-nowrap">

                <a class="nav-link" href="{{ route('register') }}">Register </a>
            </li>
        @endauth
    </ul>
</nav>
