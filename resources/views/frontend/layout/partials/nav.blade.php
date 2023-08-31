<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="/"><img src="{{ asset('assets/img/freelance-writer.PNG') }}" alt="Logo"></a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto " href="#faq">Faq</a></li>

                @auth

                    <li>
                        <a class="getstarted scrollto" href="{{ route('register') }}">Dashboard</a>
                    </li>
                    <li>
                        <a class="getstarted" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Sign out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                @else

                    <li>
                        <a class="getstarted scrollto" href="{{ route('register') }}">REGISTER NOW !</a>
                    </li>
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">SIGN-IN</a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
